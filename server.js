import express from 'express';
import { createServer } from 'http';
import { Server } from 'socket.io';
import cors from 'cors';
import Redis from 'ioredis';
import axios from 'axios';
import fs from 'fs';

const app = express();
app.use(cors());

const http = createServer(app);
const io = new Server(http, {
    cors: {
        origin: 'http://127.0.0.1:8000',
        methods: ['GET', 'POST'],
        allowedHeaders: ['my-custom-header'],
        credentials: true
    }
});

const PORT = 8005; // Define the PORT variable

const redisSubscriber = new Redis();
const redisClient = new Redis(); // Separate Redis connection for other operations
const users = [];

http.listen(PORT, function () {
    console.log(`Listening to port ${PORT}`);
});

redisSubscriber.subscribe('private-channel', function() {
    console.log('subscribed to private channel');
});

redisSubscriber.on('message', function(channel, message) {
    try {
        message = JSON.parse(message);
    } catch (e) {
        console.error('Error parsing message', e);
        return;
    }
    
    console.log(message);
    console.log(channel);

    if (channel === 'private-channel') {
        const data = message.data;
        if (!data) {
            console.error('Data is undefined');
            return;
        }

        const reciever_id = data.reciever_id;
        const event = message.event;

        if (reciever_id && users[reciever_id]) {
            io.to(`${users[reciever_id]}`).emit(`${channel}:${event}`, data);
        } else {
            console.error('Reciever ID is undefined or user not connected');
        }
    }
});

io.on('connection', function (socket) {
    socket.on("user_connected", function (user_id) {
        users[user_id] = socket.id;
        io.emit('updateUserStatus', users);
        console.log("user connected " + user_id);
    });

    socket.on("disconnect", function() {
        // Find the user ID by socket ID and remove it from the users object
        for (const [user_id, socket_id] of Object.entries(users)) {
            if (socket_id === socket.id) {
                delete users[user_id];
                break;
            }
        }
        io.emit('updateUserStatus', users);
        console.log(users);
    });

    socket.on('view-costume', async (data, callback) => {
        console.log('view-costume event received:', data);
        
        try {
            let costumeId = data.costumeId;
            await redisClient.incr(`costume:${costumeId}:views`);
            let views = await redisClient.get(`costume:${costumeId}:views`);
            console.log(`Updated views for costume ID ${costumeId}: ${views}`);
            io.emit('update-views', { costumeId: costumeId, views: views });
    
            axios.post('http://127.0.0.1:8000/api/update-costume-view', {
                costumeId: costumeId,
                views: views
            }).then(response => {
                console.log('Broadcast success:', response.data);
                if (callback) callback({ status: 'success', data: response.data });
            }).catch(error => {
                console.error('Broadcast error:', error);
                if (callback) callback({ status: 'error', error: error.message });
            });
        } catch (error) {
            console.error('Error handling view-costume event:', error);
            if (callback) callback({ status: 'error', error: error.message });
        }
    });
});

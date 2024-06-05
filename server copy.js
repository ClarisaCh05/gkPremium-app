import express from 'express';
import { createServer } from 'http';
import { Server } from 'socket.io';
import cors from 'cors';
import Redis from 'ioredis';

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

var redis = new Redis();
var users = [];

http.listen(PORT, function () {
    console.log(`Listening to port ${PORT}`);
});

redis.subscribe('private-channel', function() {
    console.log('subscribed to private channel');
});

redis.on('message', function(channel, message) {
    message = JSON.parse(message);
    console.log(message);
    console.log(channel);
    if (channel == 'private-channel') {
        let data = message.data.data;
        let reciever_id = data.reciever_id;
        let event = message.event;

        io.to(`${users[reciever_id]}`).emit(channel + ':' + message.event, data);
    }
    console.log(message);
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
});

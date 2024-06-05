@extends('layouts.home')
@section('css')
    <style>
      .card {
        box-shadow: 2px 6px 8px rgba(22, 22, 26, 0.18);
      }
    </style>
@endsection
@section('main')
  @include('partials.carouselPartials')
@endsection
@section('javascript')
<script> 
    document.addEventListener('DOMContentLoaded', function (e) {
      var elementsToAnimate = [
                document.querySelector('.katalog-c-ctr'),
                document.querySelector('.bridestation'),
                document.querySelector('.kategori'),
                document.querySelector('.seen-c')
              ];
      
            // Function to check if an element is in the viewport
            function isInViewport(element) {
                var rect = element.getBoundingClientRect();
                var windowHeight = window.innerHeight || document.documentElement.clientHeight;
                var windowWidth = window.innerWidth || document.documentElement.clientWidth;
      
                // Check if any part of the element is within the viewport
                return (
                  rect.top < windowHeight &&
                  rect.bottom > 0 &&
                  rect.left < windowWidth &&
                  rect.right > 0
                );
            }
      
            function handleScroll() {
              // Iterate over each element in the queue
              elementsToAnimate.forEach(function(element) {
                  if (element) { // Check if the element exists
                      // Check if the element is in the viewport and not already animated
                      if (isInViewport(element) && !element.classList.contains('animate')) {
                          element.classList.add('animate'); // Add animation class
                      }
                  } else {
                      console.log("Element is null or undefined:", element); // Log null or undefined elements
                  }
              });

              // Remove scroll event listener once all animations are triggered
              if (elementsToAnimate.every(function(element) {
                  return element && element.classList.contains('animate');
              })) {
                  window.removeEventListener('scroll', handleScroll);
              }
          }

          // Example usage
          elementsToAnimate = Array.from(elementsToAnimate); // Convert NodeList to Array
          window.addEventListener('scroll', handleScroll);

            // Add scroll event listener
            window.addEventListener('scroll', handleScroll);
    })
</script>
@endsection
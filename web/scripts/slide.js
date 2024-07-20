     let slideIndex = 0;
        function showSlide(n) {
          const slides = document.querySelectorAll('.slides canvas');
          if (n >= slides.length) {
            slideIndex = 0;
          } else if (n < 0) {
            slideIndex = slides.length - 1;
          }
          for (let i = 0; i < slides.length; i++) {
            slides[i].style.transform = `translateX(${-slideIndex * 100}%)`;
          }
        }
        
        function nextSlide() {
          slideIndex++;
          showSlide(slideIndex);
        }
        
        function prevSlide() {
          slideIndex--;
          showSlide(slideIndex);
        }
    
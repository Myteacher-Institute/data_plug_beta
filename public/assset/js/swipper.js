      // script.js

      let currentIndex = 0;
      const cardWidth = 220; // default width of each card + margin
      const cardsToShow = 3; // default number of cards to show in the view

      function scrollCards(direction) {
        const cardSlider = document.querySelector(".card-slider");
        const totalCards = document.querySelectorAll(".card").length;

        currentIndex += direction;

        // Adjust currentIndex based on direction and total cards
        if (currentIndex < 0) {
          currentIndex = 0;
        }

        if (currentIndex > totalCards - cardsToShow) {
          currentIndex = totalCards - cardsToShow;
        }

        // Update slider position
        const offset = -currentIndex * cardWidth;
        cardSlider.style.transform = `translateX(${offset}px)`;
      }

      // Adjust card width and number of cards to show based on window size
      function updateCardDimensions() {
        const cardSlider = document.querySelector(".card-slider");
        const totalCards = document.querySelectorAll(".card").length;

        let cardCount = 3; // Default cards to show

        if (window.innerWidth <= 768) {
          cardCount = 2;
          cardWidth = 160; // Adjust for smaller breakpoint
        }

        if (window.innerWidth <= 480) {
          cardCount = 1;
          cardWidth = 130; // Adjust for mobile
        }

        // Update the number of cards to show
        currentIndex = Math.min(currentIndex, totalCards - cardCount);
        const offset = -currentIndex * cardWidth; // Update the offset
        cardSlider.style.transform = `translateX(${offset}px)`; // Apply the new offset
      }

      // Update on load and resize
      window.addEventListener("resize", updateCardDimensions);
      window.addEventListener("DOMContentLoaded", updateCardDimensions);
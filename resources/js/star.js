document.addEventListener("DOMContentLoaded", () => {
    const stars = Array.from(document.getElementsByClassName("star"));
    const selectedStarInput = document.getElementById("selected-star");
    const reviewForm = document.getElementById("review-form");
    const modal = document.getElementById("user-profile-delete");
    let selectedValue = null;

    function updateStarColors(index) {
        stars.forEach((star, i) => {
            if (i <= index) {
                star.classList.add('hover');
            } else {
                star.classList.remove('hover');
            }
        });
    }

    function updateStarSelection(index) {
        stars.forEach((star, i) => {
            if (i <= index) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    function resetStarColors() {
        stars.forEach(star => {
            star.classList.remove('hover');
        });
    }

    function setSelectedStar(index) {
        selectedValue = stars[index].getAttribute("data-value");
        selectedStarInput.value = selectedValue;
        updateStarSelection(index);
    }

    stars.forEach((star, index) => {
        star.addEventListener("mouseover", () => {
            if (selectedValue === null) {
                updateStarColors(index);
            }
        });

        star.addEventListener("mouseout", () => {
            if (selectedValue === null) {
                resetStarColors();
            } else {
                updateStarColors(stars.findIndex(star => star.getAttribute("data-value") === selectedValue));
            }
        });

        star.addEventListener("click", () => {
            if (selectedValue === stars[index].getAttribute("data-value")) {
                // Deselect if clicking the already selected star
                selectedValue = null;
                selectedStarInput.value = "";
                resetStarColors();
            } else {
                setSelectedStar(index);
            }
        });
    });

    //modalを再表示
    window.onload = function() {
        const errorContainer = document.getElementById('error-container');
        const hasErrors = errorContainer.dataset.hasErrors === 'true';
        const reviewSubmitted = errorContainer.dataset.reviewSubmitted === 'true';

        if (hasErrors || reviewSubmitted) {
            $('#all-reviews-page').modal('show');
        }
    }
});

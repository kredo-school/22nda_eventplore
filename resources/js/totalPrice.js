// 合計金額の表示
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('shown.bs.modal', function(event) {
            const reservationId = modal.getAttribute('id').replace('user-edit-reservation', '');
            const ticketInput = document.getElementById(`num_tickets${reservationId}`);
            const totalPriceElement = document.getElementById(`total-price${reservationId}`);
            const pricePerTicket = parseFloat(modal.getAttribute('data-price'));

            ticketInput.addEventListener('input', function() {
                let numTickets = parseInt(ticketInput.value);
                if (isNaN(numTickets) || numTickets < 1) {
                    numTickets = 1;  // デフォルトのチケット数
                }
                const totalPrice = numTickets * pricePerTicket;
                totalPriceElement.textContent = `¥${totalPrice.toLocaleString()}`;
            });
        });
    });
});
function setActive(card){
    document.querySelectorAll('.snack-card').forEach(el =>{
        el.classList.remove('active');
    });
    card.classList.add('active');
}


  window.addEventListener('load', function() {
    const secondCard = document.getElementById('second-card');
    if (secondCard) {
      secondCard.scrollIntoView({ behavior: 'auto', inline: 'center', block: 'nearest' });
    }
  });

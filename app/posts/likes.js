'use strict';

const formsLikes = document.querySelectorAll('.likes');

formsLikes.forEach(form => {
	form.addEventListener('submit', (event) => {

	  event.preventDefault();

	  const formLikes = new FormData(form);

	  fetch('app/posts/likes.php', {
	      method: 'POST',
	      body: formLikes
	    })
	    .then(response => response.json())
	    .then(json => form.nextElementSibling.textContent = json[0].likes + " likes")
	});
});

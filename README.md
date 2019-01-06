<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">
  <title>JavaScript Decides</title>
</head>
<body>
  <div class="container text-center">
    <h3 class="title">
      Pusher Real-time Vote Counter.
      <h5 class="subheader">JavaScript Decides</h5>
    </h3>

    <div class="row">
      <div class="columns medium-6">
        <div class="stat" id="vote-1">0</div>
        <p class="subheader"><small>number of votes</small></p>
        <button class="button vote-button" data-vote="1">Vote for me</button>
      </div>
      <div class="columns medium-6">
        <div class="stat" id="vote-2">0</div>
        <p class="subheader"><small>number of votes</small></p>
        <button class="button vote-button" data-vote="2">Nah, Vote for me</button>
      </div>
    </div>
    <hr>
  </div>

  <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
  <script>
    const pusher = new Pusher('YOUR_APP_KEY', {
      cluster: 'eu',
      encrypted: true
    });

    const channel = pusher.subscribe('counter');

    channel.bind('vote', data => {
      let elem = document.querySelector(`#vote-${data.item}`),
          votes = parseInt(elem.innerText);
      elem.innerText = votes + 1;
    });

    const voteButtons = document.getElementsByClassName("vote-button");

    function voteItem() { 
      let vote_id = this.getAttribute("data-vote");

      // Make Ajax call with JavaScript Fetch API
      fetch(`/vote?item_id=${vote_id}`)
          .catch( e => { console.log(e); });
    }

    // IIFE - Executes on page load
    (function() {
      for (var i = 0; i < voteButtons.length; i++) {
        voteButtons[i].addEventListener('click', voteItem);
      }
    })();
  </script>
  </body>
</html>

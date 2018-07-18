@extends('layouts.app')
@section('content')
<div class="container">
    <div class="content">
      <h1>Laravel 5 and Pusher is fun!</h1>
      <ul id="messages" class="list-group">
        <li v-for="message in messages">
            @{{message.message}}
        </li>
        <input type="text" name="message"  v-model="commentBox">
        <button class="btn btn-success" style="margin-top:10px" @click.prevent="postMessage">Save Comment</button>
      </ul>
    </div>
</div>
@endsection
@section('scriptTag')
  <script>
      const app = new Vue({
        el: '#messages',
        data: {
          messages: {},
          commentBox: '',
          id: {!! $id !!},
          user_id: {!! Auth::check() ? Auth::id() : 'null' !!}
        },
        mounted() {
          this.getMessages();
          this.listen();
        },
        methods: {
          getMessages() {
            axios.get('/api/chats')
                  .then((response) => {
                    this.messages = response.data
                    console.log(response.data);
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
          },
          postMessage() {
            axios.post('/api/chats', {
              api_token: this.api_token,
              msg: this.commentBox,
              user_id: this.user_id,
              to_user_id: this.id
            })
            .then((response) => {
              this.messages.unshift(response.data);
              console.log(response);
              this.commentBox = '';
            })
            .catch((error) => {
              console.log(error);
              this.commentBox = '';

            })
           },
          listen() {
            Echo.private('chats.'+this.id)
                .listen('ChatEvent', (message) => {
                  this.messages.unshift(message);
                  console.log(message);
                });
                // Echo.private('chats.'+this.user_id)
                //     .listen('ChatEvent', (message) => {
                //       this.messages.unshift(message);
                //       console.log(message);
                //       console.log('message');
                //     })

          }
        }
      })

    </script>

@endsection

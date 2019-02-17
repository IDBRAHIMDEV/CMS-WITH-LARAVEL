@extends('layouts.site')

@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  new Vue({
      el: '#app',
      data: {
        contact: {
            message: "",
            name: "",
            email: "",
            object: ""
        },
        status: 0
      },
      methods: {
          addContact: function() {
              
              axios.post('http://localhost:8000/contact', this.contact)
                   .then((res) => {
                       this.contact =  {
                            message: "",
                            name: "",
                            email: "",
                            object: ""
                        }
                        this.status = 1;
                   })
                   .catch((err) => console.error(err))
          }
      }
  })
</script>
@stop



@section('content')

    
    <div class="col-md-6 mx-auto" id="app">
       <div v-if="!status">
            <div class="form-group">
                    <label for="name">name</label>
                    <input v-model="contact.name" name="name" id="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input v-model="contact.email" name="email" id="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="object">object</label>
                    <input v-model="contact.object" name="object" id="object" type="text" class="form-control">
                </div>
                <textarea v-model="contact.message" name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                <button type="button" class="btn btn-block btn-primary" @click="addContact()">Contact Us</button>
       </div>
       <div v-else>
           <div class="row">
               <div class="col-md-6 mx-auto">
                   <div class="alert alert-success">Your message is sended</div>
               </div>
           </div>
          
       </div>

    </div>

@stop
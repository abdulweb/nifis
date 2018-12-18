@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>WELCOME TO ROOM</h1><a href="{{route('home')}}">LEAVE ROOM</a></div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-8">
                            <h4>questions today</h4>
                        </div>

                        <div class="col-sm-4">
                            <h4>People Present</h4>
                            <div v-for="user in users">
                                @{{user.first_name}}
                            </div>
                        </div>
                        
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<script>
    const app = new Vue({
        el: '#app',
        data: {
            
            users: {}
        },
        mounted() {
            Echo.join(`chat`)
            .here((users) => {
                this.users = users;
            })
            .joining((user) => {
                alert(`${user.email} has just join the room now as such is available from now untill he leave the room`);
            })
            .leaving((user) => {
                alert(`${user.email} has just leaved room as such he is not available in the room any more`);
            });
        }
   })
</script>

@endsection


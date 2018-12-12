<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example and tesing again again component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            Echo.join(`chat`)
            .here((users) => {
                console.log(users);
            })
            .joining((user) => {
                console.log(`${user.first_name} join`);
            })
            .leaving((user) => {
                console.log(`${user.first_name} leaved`);
            });
        }
    }
</script>

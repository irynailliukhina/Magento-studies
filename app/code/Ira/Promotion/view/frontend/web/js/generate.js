define([], function ($){
    'use strict';
    const input = document.getElementById('subscribe');

    function randomString(length) {
        let string = '';
        let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let charactersLength = characters.length;
        for ( let i = 0; i < length; i++ ) {
            string += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return string;
    }

        document.getElementById('generate')
            .addEventListener("click", ()=>{
            input.value = 'http://new.test/promotion/'+randomString(6);
        })

        document.getElementById('copy')
            .addEventListener("click", ()=>{
                input.select()
                document.execCommand("copy");
            })


})



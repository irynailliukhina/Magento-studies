define(['jquery'], function ($){
    'use strict';
    $("#accordion").accordion()
    return function (config, element){
        $(element).text(config.newHeader)
    }

})

console.log("element");
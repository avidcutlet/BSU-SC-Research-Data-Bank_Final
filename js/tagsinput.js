(function(){
// The DOM element you wish to replace with Tagify
var input = document.querySelector('input[name=basic]');

    // initialize Tagify on the above input node reference
    tagify = new Tagify(input, {
        /* Whitelist is a predefined words for keywords */
        pattern: /^.{3,30}$/,
        keepInvalidTags: false,
        maxTags: 5,
        placeholder: "Keywords",
        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
    });
})()
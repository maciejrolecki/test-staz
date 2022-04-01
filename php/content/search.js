$("#recherche").submit(function (e) {
    e.preventDefault()
    var term = $(this).find("input[name='term']").val()
    $.ajax({
        url: encodeURI(home + "search/" + term + "?type=json"),
        data: {},
        success: function (data) {
            let content = ""
            if (term.length !== 0) {
                // Current URL
                const nextURL = encodeURI(home + 'search/' + term);
                const nextTitle = 'Recherche ' + term;
                const nextState = {additionalInformation: 'Updated the URL with JS'};
                // This will create a new entry in the browser's history, without reloading
                window.history.pushState(nextState, nextTitle, nextURL);
                if (data) for (let i = 0; i < data.length; i++) {
                    content += '<article>'
                    content += `<a href="${home}game/${data[i]['id']}">`
                    content += '<div class="searched_game">'
                    content += '<img class="image_cover_pres" src=' + data[i]['cover'] + ' width="150" height="200" alt="' + data[i]['title'] + ' cover">'
                    content += '<div>'
                    content += '<h3 class="search">' + data[i]['title'] + '</h3>'
                    content += '</div>'
                    content += '</div>'
                    content += '</a>'
                    content += '</article>'
                }
            } else {
                content += '<h2>Nothing to look for ¯\\_(ツ)_/¯</h2>'
            }
            $(".listGames").html(content)
        }
    });
})

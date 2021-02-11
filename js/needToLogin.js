//check of user isn't logged in and pressed download or view pdf
//this is for viewing pdf
function needToLoginView() {
    swal({
        title: "Sign in first!",
        text: "You need to sign in first to view full pdf.",
        icon: "warning",
        buttons: {
            cancel: "Close",
            login: {
                text: "Sign in",
                value: "login"
            } 
        }
        })
        .then((value) => {
            switch (value) {

                case "login":
                $("#signIn_mc").modal('show')
            }
        })
    }

//this is for downloading pdf
function needToLoginDownload() {
    swal({
        title: "Sign in first!",
        text: "You need to sign in first to download pdf.",
        icon: "warning",
        buttons: {
            cancel: "Close",
            login: {
                text: "Sign in",
                value: "login"
            }
        }
    })
        .then((value) => {
            switch (value) {

                case "login":
                $("#signIn_mc").modal('show')
            }
        })
}

//this is for viewing pdf (modal)
function needToLoginViewModal() {
    swal({
        title: "Sign in first!",
        text: "You need to sign in first to view full pdf.",
        icon: "warning",
        buttons: {
            cancel: "Close",
            login: {
                text: "Sign in",
                value: "login"
            } 
        }
        })
        .then((value) => {
            switch (value) {

                case "login":
                $("#cModalContent").modal('hide'),
                $("#signIn_mc").modal('show')
            }
        })
    }

//this is for downloading pdf (modal)
function needToLoginDownloadModal() {
    swal({
        title: "Sign in first!",
        text: "You need to sign in first to download pdf.",
        icon: "warning",
        buttons: {
            cancel: "Close",
            login: {
                text: "Sign in",
                value: "login"
            }
        }
    })
        .then((value) => {
            switch (value) {

                case "login":
                $("#cModalContent").modal('hide'),
                $("#signIn_mc").modal('show')
            }
        })
}
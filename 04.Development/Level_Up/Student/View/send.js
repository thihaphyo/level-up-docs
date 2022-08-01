function sendEmail(){
    Email.send({
        Host : "smtp.gmail.com",
        Username : "myot0253@gmail.com",
        Password : "ngakaSpaw",
        To : 'mushi17600@gmail.com',
        From :"myot0253@gmail.com",
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );
}
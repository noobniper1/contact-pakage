<html>
    <head>
        <title>Contact Us</title>
    </head>
    <body>
        <h1>Contact Us any time</h1>
        <form action="{{route('contact')}}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Your Name Please">
            <input type="email" name="email" placeholder="Your Email Please">
            <textarea name="message"  cols="30" rows="10" placeholder="Your Query"></textarea>
            <input type="submit" value="submit">
        </form>
    </body>
</html>
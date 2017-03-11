# Hachi GitHub Search
PHP MVC Web Application which uses GitHub API and provide given features

- Search the Developers from their email-id
        `manoj@kumarmj.me`
- Search the awesome developers in specific language `php` or `python`

- No Need to Sign Up

## Logic

 - **Three views:** *Search, Results & Profile*
 - **Two Controllers:** *Search, show & special*
 - **Search** Takes `query` paramerter
   - Check if email
     - If result, redirect to profile route
     - else no result
   - If Language
     - Perform Query Return Search Results
 - Search View: home page
 - **Profile Query**
 - 
        `curl -i https://api.github.com/search/users?q=$(email)`
 - searches language developers
 - 
        `curl -i https://api.github.com/search/users?q=+language:$(lang)&sort=followers`
 - **Something Awesome**
 - 
        `curl -i https://api.github.com/search/users?q=+location:$(city)&sort=followers`


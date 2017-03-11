<!DOCTYPE html>
<html>
    <head>
        <title>Search Results</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" integrity="sha256-mDRlQYEnF3BuKJadRTD48MaEv4+tX8GVP9dEvjZRv3c=" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <style>
            html,
            body {
              height: 100%;
              width: 100%;
            }
            
            .wrapper {
              display: flex;
              flex-direction: column;
              justify-content: space-around;
              max-height: 20%;
              text-align: center;
              padding: 30px 0;
            }
            
            .result-wrapper {
              display: inline-flex;
              flex-direction: row;
              justify-content: space-around;  
              text-align: center;
              padding: 30px 0;

            }
            .search-wrapper {
              margin: 0 12px;
            }
            
            .search-wrapper input {
              box-sizing: border-box;
              margin: 0;
              padding: 12px 48px 12px 12px;
            }
            
            .search-wrapper .icon {
              position: absolute;
              top: 12px;
              right: 12px;
            }
            
            #search-icon {
              cursor: pointer;
              color: #000;
            }
            
            .results {
              max-width: 80%;
              display: inline-flex;
              flex-direction: row;
              flex-wrap: wrap;
            }
            
            .result .card-content {
              color: rgba(0, 0, 0, 0.87);
            }
            
            .searchmatch {
              font-weight: bold;
              color: #34495e;
            }
            
            .noresult {
              color: #bdc3c7;
              margin-bottom: 100px;
            }
        </style>
    </head>
    <body>
        <header class="wrapper">
            <h1>GitHub Search</h1>
        </header>
        <hr>
        <div class="result-wrapper">
          <div class="results" id="results-container">
                @if ($found === false)
                    <div class="noresult template" id="noresult-template">
                      <h4>No results...</h4>
                    </div>
                @else
                    @foreach ($results as $result)
                        <div class="card template result" id="result-template">
                          <a href="{{'/profile'.'/'.$result['login']}}" >
                            <div class="card-content">
                              <h4>{{$result['login']}}</h4>    
                              <img src="{{$result['avatar_url']}}" />
                            </div>
                          </a>
                        </div>
                    @endforeach
                @endif
          </div>
        </div>
    </body>
</html>

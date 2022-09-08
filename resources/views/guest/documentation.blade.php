@extends('layouts.guest')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('search') }}"><img src="{{ asset('public/assets/img/ekyc-logo.png') }}" alt="Logo" class="the-logo"> EKYC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('search') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('documentation') }}">Documentation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<style>
    body{
        background-image: url('{{ asset('public/assets/img/bg.jpg') }}');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .bg-light {
        background: linear-gradient(180deg, #0e3ba0 0%, #2c2f7c 100%);
        background-color: transparent !important;
    }
    h1, h2, h3, h4, h5, h6{
        font-weight: 600;
        text-align: left;
        padding: 0;
        margin: 0;
    }
    h1{
        font-size: 24px;
    }
    h2{
        font-size: 20px;
    }
    h3{
        font-size: 18px;
    }
    h4{
        font-size: 16px;
    }
</style>
<section class="docu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body shadow py-4 p-5">
                        <h1 class="my-3">DTI EKYC for Developers</h1>
                        <h2 class="my-3">Overview</h2>
                        <h3 class="my-3">Interaction Model</h3>
                        <p class="px-3">EKYC appear in the composer drawer in Messenger once a user has interacted with the associated bot. When the user taps the chat extension's icon, it opens a webview-based UI specified by the developer. The user can then create or select content to be shared into the thread. The message shared into the thread can contain images, links, and more.When users in the group interact with any messages shared in this manner, the developer will have access to context info on the thread, ability to ask for permissions, and everything else provided in the Messenger Extensions JavaScript SDK.</p>
                        <h2 class="my-3">Configuring the Drawer Entry Point</h2>
                        <p class="px-3">To allow your bot to appear in the drawer for people who have added it, you must set its home URL. To display a webpage with the Messenger Extensions SDK enabled in the Messenger webview you must whitelist the domain, including sub-domain, in the whitelisted_domains property of your bot's Messenger Profile. This ensures that only trusted domains have access to user information available via SDK functions For more information on whitelisting domains, see the whitelisted_domains reference. If your chat extension is not ready to launch, please take care to set in_test to true to prevent it from showing up for non-developers until it's ready.</p>
                        <h2 class="my-3">Sharing</h2>
                        <p class="px-3">Messenger Platform supports custom sharing from the webview, letting developers provide a custom message and destination for messages shared from their bot. Several enhancements were added to these features to allow them to work with Chat Extensions. Here's what you should know:</p>
                        <h3 class="my-3 px-3">Sharing to the Current Thread</h3>
                        <p class="px-3">The beginShareFlow() function has a mode parameter which now supports current_thread mode. This allows the user to share to the thread they invoked the Chat Extension from, rather than having to select another thread. Most developers should choose current_thread mode for inside the extension itself. There may be situations where you wish to check whether this mode is supported by the user's version of Messenger. Use the getSupportedFeatures() method and check for the key "sharing_direct" to be sure.</p>
                        <h3 class="my-3 px-3">Reacting to Shares</h3>
                        <p class="px-3">The success callback for beginShareFlow() is called regardless of whether the user confirms the share or cancels, as long as no error was encountered. Messenger now passes is_sent field in the response to the success callback telling you whether a message was actually sent. After the user has shared, it's a good idea to close the window if you're done, or direct the user to the next part of the flow.</p>
                        <div class="coded mt-4">
                        <p class="p-3 px-4"> COPY</p>
    <blockquote>
    <pre>
    <code>
    var messageToShare = { ... };

    MessengerExtensions.beginShareFlow(function success(response) {
    if(response.is_sent === true){ 
        // User shared. We're done here!
        MessengerExtensions.requestCloseBrowser();
    }
    else{
        // User canceled their share! 

    }
    }, 
    function error(errorCode, errorMessage) {      
    // An error occurred trying to share!
    },
    messageToShare,
    "current_thread"); 
    </code>
    </pre>
    </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
 <script>
 </script>
@endsection
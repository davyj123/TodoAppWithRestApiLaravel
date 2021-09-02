<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do App') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/dashboard.css') }}">
    <div class="wrapper">
        <form id="submit" method="POST">
            <input data-userid="{{ Auth::user()->email }}" type="text" id="task" name="Task" required placeholder="Enter Your Task">
            <input id="submitbtn" type="submit" value="Add">
        </form>
        <div class="tasks">
            <div class="loader">
                
            </div>
            <div id="pending">
                <h4>Pending Tasks</h4>
                <ul>

                </ul>
            </div>
            <div id="done">
                <h4>Completed Tasks</h4>
                <ul>
                    
                </ul>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="{{ asset('frontend/js/Todocode.js') }}"></script>
        <script>            
            $(document).ready(function() {
                get("pending");                
                get("done");

                $('#submit').on("submit", function(e) {
                    e.preventDefault();
                     insert(); 
                     $("#pending ul").html('');
                     $("#done ul").html('');
                     $("#task").val("");
                     get('pending');  
                     get('done');
                });
            });
        </script>
            </div>
        </div>
    </div>
</x-app-layout>

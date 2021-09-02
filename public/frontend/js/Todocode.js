function notify(text,geo,time){
    $(".loader").html(text);
    if(geo =="none"){
        setTimeout(function(){
            $(".loader").css('display',geo);
        },time);
    }
    else{
        $(".loader").css('display',geo);
    }
    
}
function insert(){
    notify("Adding Task...","block");
        var userId = $("#task").attr("data-userid");
        var task = $("#task").val(); 
    $.ajax({
            url: '/api/todo/add',
            method: 'POST',
            headers: {
                APP_KEY: "helloatg"
            },
            data: {
                "_token": "{{ csrf_token() }}",
                user_id: userId,
                task: task
            },
            dataType: "json",
            success: function(response) {
                setTimeout(function(){
                    notify("Succesfully Added.","none",1000);
                },1000);
            },
            error: function(response) {
                console.log(response);
            }
        }); 
}

function get(task)
{
    var show = "pending";
    if(task == "pending")
    {
        var show = 'done';
    }
    var userId = $("#task").attr("data-userid");
    $.ajax({
            url: 'api/todo/tasks',
            method: 'POST',
            headers: {
            APP_KEY: "helloatg"
            },
            data: {
                "_token": "{{ csrf_token() }}",
                user_id: userId,
                status: task
            },
            dataType: "json",
            success: function(result){
                
                if(result.length == 0)
                {
                    $("#" + task + " ul").html("<li>Nothing Here.</li>")   
                }
               for(var i=0;i<result.length;i++)
               {
                   $("#" + task + " ul").append("<li><span>" + result[i].task + "</span><div class='todobtn'><button data-todo='" + show + "' data-code='" + result[i].id + "' class='updator'>Mark " + show + "</button><span data-code='"+ result[i].id +"' class='fa fa-trash-o'></span>" + "</div></li>");
               }              
            },
            error:function(result){
                console.log(result);
            }
        });
}

function Update(Uid,stat){
    notify("Updating Task...","block");
    $.ajax({
        url: 'api/todo/status',
        method: 'POST',
        headers: {
        APP_KEY: "helloatg"
        },
        data: {
            "_token": "{{ csrf_token() }}",
            id: Uid,
            status:stat
        },
        dataType: "json",
        success: function(result){
                notify("Successfully Updated","none",1000);
                $("#pending ul").html('');
                get('pending');
                $("#done ul").html('');
                get('done');
                
            
           
        },
        error:function(result){
            console.log(result);
        }
    });

}
function Delete(Uid){
    notify("Deleting Task...","block");
    $.ajax({
        url: 'api/todo/delete',
        method: 'POST',
        headers: {
        APP_KEY: "helloatg"
        },
        data: {
            "_token": "{{ csrf_token() }}",
            id: Uid
        },
        dataType: "json",
        success: function(result){
                notify("Successfully Deleted.","none",1000);
                $("#pending ul").html('');
                get('pending');
                $("#done ul").html('');
                get('done');            
            
           
        },
        error:function(result){
            console.log(result);
        }
    });

}

$(document).on("click",'.updator',function(e){
    var id = $(this).data("code");
    var todo = $(this).data("todo");
    Update(id,todo);    
});
$(document).on("click",'.fa-trash-o',function(e){
    var id = $(this).data("code");
    Delete(id);    
});


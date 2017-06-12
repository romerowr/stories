$(document).ready(function(){
    var email=$("input[name=email]").val();
    var dataString='email='+email;
    
    $("input[name=email]").on('change',function(){ 
            var email=$("input[name=email]").val();
            var dataString='email='+email;
            $.ajax({
                type: "POST",
                url: "login/valemail", 
                data: dataString,
                success: function(data) {
                    dat=JSON.parse(data); 
                    $(".msg").html("<h3>"+dat.msg+"</h3>");  
                }              
            });
        });
        
    $("#boton").on('click', function(){
        var email=$("input[name=email]").val();
        var password = $.md5($("input[name=email]").val());
        var email='email='+email;
        var passwd = 'password='+password;
            $.ajax({
                type: "POST",
                url: "login/log",
                data: dataString, passwd,
                success: function(data) {
                    dat=JSON.parse(data);  
                   if(dat.msg=="Correcto"){
                        window.location.href = dat.redir;
                        
                    }
                    else{
                        window.location = dat.redir;
                    }
                }              
            });
    });

    $("#modificar").on('click', function(){
            var name=$("input[name=name]").val();
            var email = $("input[name=email]").val();
            var password = $("input[name=password]").val();
            var set='email='+email+', password='+password+', usersname='+name;
                $.ajax({
                    type: "POST",
                    url: "editprofile/editar",
                    data: set,
                    success: function(data) {
                        dat=JSON.parse(data);   
                       if(dat.msg=="Correcto"){
                            $(".msg").html("<h3>"+dat.msg+"</h3>"); 
                            window.location.href = dat.redir;
                        }
                        else{
                            $(".msg").html("<h3>"+dat.msg+"</h3>"); 
                        }
                    }              
                });
        });

    $(".eli-story").on('click', function(){
        var id=$(this).attr('id');
        
            $.ajax({
                type: "POST",
                url: "editstory/eliminar",
                data: id,
                success: function(data) {
                   
                   dat=JSON.parse(data);   
                   if(dat.msg=="Correcto"){
                        window.location.href = dat.redir;
                        
                    }
                    else{
                        window.location = dat.redir;
                    }
                }              
            });
    });

    $(".edi-story").on('click', function(){
        
        var idstories=$("input[name=idstory]").val();
        var usuario=$("input[name=usuario]").val();
        var Path=$("input[name=path]").val();
        var titulo=$("input[name=title]").val();
        var sinopsis=$("input[name=sinopsis]").val();
        var valor=$("input[name=valormedio]").val();

        var sentencia= "idstories="+idstories+", users="+usuario+", path="+Path+", titulo='"+ titulo +"',sinopsis='"+sinopsis+"', medium_values="+valor+" WHERE idstories = "+idstories+";";
        
        $.ajax({
                type: "POST",
                url: "editstory/editar",
                data: sentencia,
                success: function(data) {
                   
                   dat=JSON.parse(data);   
                   if(dat.msg=="Correcto"){
                        $(".msg").html("<h3>"+dat.msg+"</h3>");
                        
                    }
                    else{
                        $(".msg").html("<h3>"+dat.msg+"</h3>");
                    }
                }              
            });
    });


    $(".edi-user").on('click', function(){
        var idusers=$("input[name=iduser]").val();
        var rol=$("input[name=rol]").val();
        var email=$("input[name=email]").val();
        var pass=$("input[name=password]").val();
        var usr=$("input[name=username]").val();

        var sentencia= "idusers="+idusers+", roles="+rol+", email='"+email+"', password='"+pass+"', usersname='"+usr+"' WHERE idusers = "+idusers+";";
        
            $.ajax({
                type: "POST",
                url: "edituser/editar",
                data: sentencia,
                success: function(data) {
                   
                   dat=JSON.parse(data);   
                   if(dat.msg=="Correcto"){
                        $(".msg").html("<h3>"+dat.msg+"</h3>");
                        
                    }
                    else{
                        $(".msg").html("<h3>"+dat.msg+"</h3>");
                    }
                }              
            });
    });

    $(".elm-user").on('click', function(){
        
        var id=$(this).attr('id');

        $.ajax({
                type: "POST",
                url: "edituser/eliminar",
                data: id,
                success: function(data) {
                   dat=JSON.parse(data);   
                   if(dat.msg=="Correcto"){
                        $(".msg").html("<h3>"+dat.msg+"</h3>");
                        
                    }
                    else{
                        $(".msg").html("<h3>"+dat.msg+"</h3>");
                    }
                }              
            });

        $("#newstory").on('click', function(){
            
            var id=$(this).attr('name');
            
            var texto=$("#texto").val();

            var titulo=$("#titulo").val();

            var set = texto + " " + titulo + " " + id;
            
            $.ajax({
                    type: "POST",
                    url: "addstory/add",
                    data: set,
                    success: function(set) {
                       dat=JSON.parse(data);   
                          
                       if(dat.msg=="Correcto"){
                            window.location.href = dat.redir;
                            
                        }
                        else{
                            window.location.href = dat.redir;
                        }
                    }             
                });
        });

        $("input[name=enviar]").on('click', function(){
            
            $.ajax({
                    
                    url: "story/valorar",
                    success: function(data) {
                       dat=JSON.parse(data);   
                          
                       if(dat.msg=="Correcto"){
                            $(".msg").html("<h3>"+dat.msg+"</h3>");
                            
                        }
                        else{
                            $(".msg").html("<h3>"+dat.msg+"</h3>");
                        }
                    }             
                });
        });
    });
});





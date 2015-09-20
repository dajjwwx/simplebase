jQuery File UPload plugin provides Multiple file uploads with progress bar. jQuery File Upload Plugin depends on Ajax Form Plugin, So Github contains source code with and without Form plugin.
1). Add the CSS and JS files in the head sections

<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.1/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.1/jquery.uploadfile.min.js"></script>


2). Add a div to body to handle file uploads

<div id="fileuploader">Upload</div>


3). Initialize the plugin when the document is ready.

<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
	url:"YOUR_FILE_UPLOAD_URL",
	fileName:"myfile"
	});
});
</script>


Thats it. jQuery Ajax File uploader with progress bar is ready now.

jQuery File upload plugin has the following features.

    Single File Upload
    Multiple file Upload (Drag & Drop)
    Sequential file upload
    File Restrictions
    Localization (Multi-language)
    Sending Form Data
    Adding HTML elements to progressbar
    Custom UI
    Upload Events
    Delete / Download Uploaded files
    Image Preview
    Show previous uploads

1).Single File Upload
With the below configuration, plugin allows only single file upload (without drag & drop).
Source:

 $("#singleupload").uploadFile({
url:"upload.php",
multiple:false,
dragDrop:false,
maxFileCount:1,
fileName:"myfile"
}); 


2).Multiple file Upload (Drag &Drop)
With the below configuration, plugin supports multiple file upload with drag & drop.
Source:

 $("#multipleupload").uploadFile({
url:"upload.php",
multiple:true,
dragDrop:true,
fileName:"myfile"
}); 


3).Sequential file Upload
With the below configuration, plugin uploads the file sequentially. you can control number of active uploads with sequentialCount.
Source:

 $("#sequentialupload").uploadFile({
url:"upload.php",
fileName:"myfile",
sequential:true,
sequentialCount:1	
}); 


4).Upload with File Restrictions
With the below configuration, plugin allows only specific file types.
Source:

 $("#restrictupload1").uploadFile({
url:"upload.php",
fileName:"myfile",
acceptFiles:"image/*"
}); 


Output:
Upload



With the below configuration, plugin allows only files lesser than the specified size/count.
Source:

 $("#restrictupload2").uploadFile({
url:"upload.php",
fileName:"myfile",
maxFileCount:3,
maxFileSize:100*1024
}); 


Output:
Upload
5).Localization
With the below configuration, you can change all the plugin strings.
Source:

 
$("#localupload").uploadFile({
	url:"upload.php",
	fileName:"myfile",
	dragDropStr: "<span><b>�Ϸ��ļ�</b></span>",
    abortStr:"��ֹ",
	cancelStr:"ȡ��",
	doneStr:"���",
	multiDragErrorStr: "Plusieurs Drag &amp; Drop de fichiers ne sont pas autoris��s.",
	extErrorStr:"n'est pas autoris��. Extensions autoris��es:",
	sizeErrorStr:"n'est pas autoris��. Admis taille max:",
	uploadErrorStr:"Upload n'est pas autoris��",
	uploadStr:"T��l��chargez"
	});


Output:
6).Sending Form Data
With the below configuration, plugin sends the form data with every file uploaded. form data can be accessed at server side using $_POST.
Source:

 $("#formdata1").uploadFile({
url:"upload.php",
fileName:"myfile",
formData: {"name":"Ravi","age":31}	
}); 


Output:
Upload


With the below configuration, plugin sends dynamic form data with every file upload. For example, if you want to send updated 'input' value with the uploaded file.
Source:

 $("#formdata2").uploadFile({
url:"upload.php",
fileName:"myfile",
dynamicFormData: function()
{
	var data ={ location:"INDIA"}
	return data;
}
}); 


Output:
Upload
7).Add extra HTML Elements
With the below configuration,plugin allows to add extra HTML elements (input,textarea,select) to status bar.
Source:

 var extraObj = $("#extraupload").uploadFile({
url:"upload.php",
fileName:"myfile",
extraHTML:function()
{
    	var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' /> <br/>";
		html += "<b>Category</b>:<select name='category'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
		html += "</div>";
		return html;    		
},
autoSubmit:false
});
$("#extrabutton").click(function()
{

	extraObj.startUpload();
}); 


Output:
Start Upload
8).Custom UI
Using the below configuration, you can design your own progress bar.
Source:

 var count=0;
	$("#customupload1").uploadFile({
	url:"upload.php",
	fileName:"myfile",
	showFileCounter:false,
	customProgressBar: function(obj,s)
		{
			this.statusbar = $("<div class='custom-statusbar'></div>");
            this.preview = $("<img class='custom-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.statusbar).hide();
            this.filename = $("<div class='custom-filename'></div>").appendTo(this.statusbar);
            this.progressDiv = $("<div class='custom-progress'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='custom-bar'></div>").appendTo(this.progressDiv);
            this.abort = $("<div>" + s.abortStr + "</div>").appendTo(this.statusbar).hide();
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deletelStr + "</div>").appendTo(this.statusbar).hide();
            
            this.abort.addClass("custom-red");
            this.done.addClass("custom-green");
			this.download.addClass("custom-green");            
            this.cancel.addClass("custom-red");
            this.del.addClass("custom-red");
            if(count++ %2 ==0)
	            this.statusbar.addClass("even");
            else
    			this.statusbar.addClass("odd"); 
			return this;
			
		}	
	}); 


Output:
9).Upload Events
Below are the different callback events. Source:

 $("#eventsupload").uploadFile({
url:"upload.php",
multiple:true,
fileName:"myfile",
returnType:"json",
onLoad:function(obj)
{
		$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Widget Loaded:");
},
onSubmit:function(files)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
	//return false;
},
onSuccess:function(files,data,xhr,pd)
{

	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
	
},
afterUploadAll:function(obj)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded");
	

},
onError: function(files,status,errMsg,pd)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Error for: "+JSON.stringify(files));
},
onCancel:function(files,pd)
{
		$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Canceled  files: "+JSON.stringify(files));
}
}); 


Output:
10).Delete/Download Files
With the below configuration, plugin supports File download and File delete features. Source:

 $("#deleteupload").uploadFile({url: "upload.php",
dragDrop: true,
fileName: "myfile",
returnType: "json",
showDelete: true,
showDownload:true,
statusBarWidth:600,
dragdropWidth:600,
deleteCallback: function (data, pd) {
    for (var i = 0; i < data.length; i++) {
        $.post("delete.php", {op: "delete",name: data[i]},
            function (resp,textStatus, jqXHR) {
                //Show Message	
                alert("File Deleted");
            });
    }
    pd.statusbar.hide(); //You choice.

},
downloadCallback:function(filename,pd)
	{
		location.href="download.php?filename="+filename;
	}
}); 


Output:
11).Image Preview
To enable image preview, use the below configuration. Source:

 $("#previewupload").uploadFile({
url:"upload.php",
fileName:"myfile",
acceptFiles:"image/*",
showPreview:true,
 previewHeight: "100px",
 previewWidth: "100px",
}); 


Output:
12).Show already uploaded files
With the below configuration,plugin loads the previousily uploaded files. Source:

 $("#showoldupload").uploadFile({url: "upload.php",
dragDrop: true,
fileName: "myfile",
returnType: "json",
showDelete: true,
showDownload:true,
statusBarWidth:600,
dragdropWidth:600,
maxFileSize:200*1024,
showPreview:true,
previewHeight: "100px",
previewWidth: "100px",

onLoad:function(obj)
   {
   	$.ajax({
	    	cache: false,
		    url: "load.php",
	    	dataType: "json",
		    success: function(data) 
		    {
			    for(var i=0;i<data.length;i++)
   	    	{ 
       			obj.createProgress(data[i]["name"],data[i]["path"],data[i]["size"]);
       		}
	        }
		});
  },
deleteCallback: function (data, pd) {
    for (var i = 0; i < data.length; i++) {
        $.post("delete.php", {op: "delete",name: data[i]},
            function (resp,textStatus, jqXHR) {
                //Show Message	
                alert("File Deleted");
            });
    }
    pd.statusbar.hide(); //You choice.

},
downloadCallback:function(filename,pd)
	{
		location.href="download.php?filename="+filename;
	}
}); 


Output:

Jquery File Upload
Source:

$("#singleupload1").uploadFile({
	url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php"
	});

Output:
Upload



Jquery File Upload with File Restrictions
Source:

$("#singleupload2").uploadFile({
url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php",
allowedTypes:"png,gif,jpg,jpeg",
fileName:"myfile"
});

Output:
Upload

Jquery Advanced File Upload
Source:

var uploadObj = $("#advancedUpload").uploadFile({
url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php",
multiple:true,
autoSubmit:false,
fileName:"myfile",
formData: {"name":"Ravi","age":31},
maxFileSize:1024*100,
maxFileCount:1,
dynamicFormData: function()
{
	var data ={ location:"INDIA"}
	return data;
},
showStatusAfterSuccess:false,
dragDropStr: "<span><b>Faites glisser et d��posez les fichiers</b></span>",
abortStr:"abandonner",
cancelStr:"r��silier",
doneStr:"fait",
multiDragErrorStr: "Plusieurs Drag & Drop de fichiers ne sont pas autoris��s.",
extErrorStr:"n'est pas autoris��. Extensions autoris��es:",
sizeErrorStr:"n'est pas autoris��. Admis taille max:",
uploadErrorStr:"Upload n'est pas autoris��"

});
$("#startUpload").click(function()
{
	uploadObj.startUpload();
});


Output:
T��l��chargez


Start Upload


Jquery Delete File Option

$("#deleteFileUpload").uploadFile({
 url: "upload.php",
 dragDrop: true,
 fileName: "myfile",
 returnType: "json",
 showDelete: true,
 deleteCallback: function (data, pd) {
     for (var i = 0; i < data.length; i++) {
         $.post("delete.php", {op: "delete",name: data[i]},
             function (resp,textStatus, jqXHR) {
                 //Show Message	
                 alert("File Deleted");
             });
     }
     pd.statusbar.hide(); //You choice.
}
 });

Output:
File Upload (Delete)

Jquery Multiple File Upload
Source:

$("#multipleupload").uploadFile({
url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php",
multiple:true,
fileName:"myfile"
});


Output:
Upload

Jquery Upload File Events
Source:

$("#eventsupload").uploadFile({
url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php",
multiple:true,
fileName:"myfile",
onSubmit:function(files)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
},
onSuccess:function(files,data,xhr)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
	
},
afterUploadAll:function()
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded");
	
},
onError: function(files,status,errMsg)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Error for: "+JSON.stringify(files));
}
});


Output:
Upload
Events:

Hide Cancel,Abort,Done Buttons
Source:

$("#stylingupload1").uploadFile({
url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php",
multiple:true,
fileName:"myfile",
showStatusAfterSuccess:false,
showAbort:false,
showDone:false,
});


Output:
Upload



Changing Upload Button style
Source:

$("#stylingupload2").uploadFile({
url:"http://hayageek.com/examples/jquery/ajax-multiple-file-upload/upload.php",
multiple:true,
fileName:"myfile",
showStatusAfterSuccess:false,
showAbort:false,
showDone:false,
uploadButtonClass:"ajax-file-upload-green"
});


Output:
Upload

jQuery Upload File API

Methods
uploadFile( options )

Creates Ajax form and uploads the files to server.

var uploadObj = $("#uploadDivId").uploadFile(options);

startUpload()

uploads all the selected files. This function is used when autoSubmit option is set to false.

uploadObj.startUpload();

stopUpload()

Aborts all the uploads

uploadObj.stopUpload();

cancelAll()

Cancel all the selected files ( when autoSubmit:false)

uploadObj.cancelAll();

remove()

remove the widget from the document.

uploadObj.remove();

reset()

resets the widget properities

uploadObj.reset();
uploadObj.reset(false);//if you dont want remove the existing progress bars

getResponses()

Responses from the server are collected and returned.

uploadObj.getResponses()

Options
url

Server URL which handles File uploads
method

Upload Form method type POST or GET. Default is POST
enctype

Upload Form enctype. Default is multipart/form-data.
formData

An object that should be send with file upload.

formData: { key1: 'value1', key2: 'value2' }

dynamicFormData

To provide form data dynamically

dynamicFormData: function()
{
    //var data ="XYZ=1&ABCD=2";
    var data ={"XYZ":1,"ABCD":2};
    return data;        
}

extraHTML

You can extra div elements to each statusbar. This is useful only when you set autoSubmit to false.

extraHTML:function()
    {
            var html = "<div><b>File tags:</b><input type='text' name='tags' value='' /> <br/>";
            html += "<b>Directory</b>:<select name='values'><option value='1'>ONE</option><option value='2'>TWO</option></select>";
            html += "</div>";
            return html;            
    }

customProgressBar

Using this you can add your own custom progress bar.

    customProgressBar: function(obj,s)
        {
            this.statusbar = $("<div class='ajax-file-upload-statusbar'></div>");
            this.preview = $("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.statusbar).hide();
            this.filename = $("<div class='ajax-file-upload-filename'></div>").appendTo(this.statusbar);
            this.progressDiv = $("<div class='ajax-file-upload-progress'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='ajax-file-upload-bar'></div>").appendTo(this.progressDiv);
            this.abort = $("<div>" + s.abortStr + "</div>").appendTo(this.statusbar).hide();
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deletelStr + "</div>").appendTo(this.statusbar).hide();

            this.abort.addClass("ajax-file-upload-red");
            this.done.addClass("ajax-file-upload-green");
            this.download.addClass("ajax-file-upload-green");            
            this.cancel.addClass("ajax-file-upload-red");
            this.del.addClass("ajax-file-upload-red");
            if(count++ %2 ==0)
                this.statusbar.addClass("even");
            else
                this.statusbar.addClass("odd"); 
            return this;
        }

sequential

Enables sequential upload. You can limit the number of uploads by sequentialCount

sequential:true,
sequentialCount:1

With the above configuration, only one file is uploaded at a time.
maxFileSize

Allowed Maximum file Size in bytes.
maxFileCount

Allowed Maximum number of files to be uploaded
returnType

Expected data type of the response. One of: null, 'xml', 'script', or 'json'. The dataType option provides a means for specifying how the server response should be handled. This maps directly to jQuery's dataType method. The following values are supported:

    'xml': server response is treated as XML and the 'success' callback method, if specified, will be passed the responseXML value
    'json': server response will be evaluted and passed to the 'success' callback, if specified
    'script': server response is evaluated in the global context

allowedTypes

List of comma separated file extensions: Default is "*". Example: "jpg,png,gif"
acceptFiles

accept MIME type for file browse dialog. Default is "". Example: "image/"
check this for full list : http://stackoverflow.com/questions/11832930/html-input-file-accept-attribute-file-type-csv
fileName

Name of the file input field. Default is file
multiple

If it is set to true, multiple file selection is allowed. Default isfalse
dragDrop

Drag drop is enabled if it is set to true
autoSubmit

If it is set to true, files are uploaded automatically. Otherwise you need to call .startUpload function. Default istrue
showCancel

If it is set to false, Cancel button is hidden when autoSubmit is false. Default istrue
showAbort

If it is set to false, Abort button is hidden when the upload is in progress. Default istrue
showDone

If it is set to false, Done button is hidden when the upload is completed. Default istrue
showDelete

If it is set to true, Delete button is shown when the upload is completed. Default isfalse,You need to implement deleteCallback() function.
showDownload

If it is set to true, Download button is shown when the upload is completed. Default isfalse,You need to implement downloadCallback() function.
showStatusAfterSuccess

If it is set to false, status box will be hidden after the upload is done. Default istrue
showError

If it is set to false, Errors are not shown to user. Default istrue
showFileCounter

If it is set to true, File counter is shown with name. Default istrue File Counter style can be changed using fileCounterStyle. Default is ).
showProgress

If it is set to true, Progress precent is shown to user. Default isfalse
showFileSize

If it is set to true, File size is shown
showPreview

If it is set to true, preview is shown to images. Default isfalse
previewHeight

is used to set preview height. Default is : "auto"
previewWidth

is used to set preview width. Default :"100%"
showQueueDiv

Using this you can place the progressbar wherever you want.

showQueueDiv: "output"

progress bar is added to a div with id output
statusBarWidth

Using this you can set status bar width
dragdropWidth

Using this you can set drag and drop div width
update

update plugin options runtime.

uploadObj.update({autoSubmit:true,maxFileCount:3,showDownload:false});

onLoad

callback back to be invoked when the plugin is initialized. This can be used to show existing files..

    onLoad:function(obj)
    {
        $.ajax({
            cache: false,
            url: "load.php",
            dataType: "json",
            success: function(data) 
            {
                for(var i=0;i<data.length;i++)
                {
                    obj.createProgress(data[i]);
                }
            }
        });
   },

onSelect

callback back to be invoked when the file selected.

onSelect:function(files)
{
    files[0].name;
    files[0].size;
    return true; //to allow file submission.
}

onSubmit

callback back to be invoked before the file upload.

onSubmit:function(files)
{
    //files : List of files to be uploaded
    //return flase;   to stop upload
}

onSuccess

callback to be invoked when the upload is successful.

onSuccess:function(files,data,xhr,pd)
{
    //files: list of files
    //data: response from server
    //xhr : jquer xhr object
}

afterUploadAll

callback to be invoked when all the files are uploaded.

afterUploadAll:function(obj)
{
    //You can get data of the plugin using obj
}

onError

callback to be invoked when the upload is failed.

onError: function(files,status,errMsg,pd)
{
    //files: list of files
    //status: error status
    //errMsg: error message
}

onCancel

callback to be invoked when user cancel the file ( when autosubmit:false)

onCancel: function(files,pd)
{
    //files: list of files
    //pd:  progress div
}

deleteCallback

callback to be invoked when the user clicks on Delete button.

deleteCallback: function(data,pd)
{
    for(var i=0;i<data.length;i++)
    {
         $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {
            //Show Message    
            alert("File Deleted");        
        });
     }        
    pd.statusbar.hide(); //You choice to hide/not.

}

downloadCallback

callback to be invoked when the user clicks on Download button.

downloadCallback:function(files,pd)
{
    location.href="download.php?filename="+files[0];
}

Custom Errors

you can send custom errors from server. like "File exists". for custom errors,expected json object from server is:


{"jquery-upload-file-error":"File already exists"}

PHP Files
upload.php
download.php
delete.php
load.php
Server settings for Large file uploads
php.ini settings

max_file_uploads = 2000
upload_max_filesize = 40000M
max_input_vars = 10000
post_max_size = 40000M


httpd.conf settings

php_value suhosin.post.max_vars 10000
php_value suhosin.request.max_vars 10000
php_value suhosin.get.max_array_depth 2000
php_value suhosin.get.max_vars 10000
php_value suhosin.upload.max_uploads 2000


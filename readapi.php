<!DOCTYPE html>
<head>

</head>
<body>
    <h1>from forum.php </h1>

    <div>Forum Home link takes you to the json page, 
        use this to get to the view of Forum
    </div>
    
    <div>
        <button>
    <a href="forumapi.php">Takes you to forumapi.php!!!</a>
</button>
</div>


    <div>
        <?php 

        //  TODO, instead of the header html just the php part of it above
        //  or text when necessary...
    include('restfulphp/headerview.php');

        
        
        //  Display links:

        //  Default links:
    //  TODO make another file for the view ..!
        require_once('./misc/linx.php');



        //  Display links based upon login status:

        require_once('./misc/logstatlinx.php');


        //  For choosing a forum / language:
    

        ?>
    </div>

    <div>
        the thread arrays are in an array , some values are undefined..!
    </div>
    <div id="jsonApiOutput">

    </div>
    <script>

        //  get the tid from url
        const urlParams = new URLSearchParams(window.location.search);
const tid = urlParams.get('tid');
console.log(tid);
        
        document.addEventListener('DOMContentLoaded', function() {
            fetch(`read.php?tid=${tid}`)
            .then(response => {
                return response.json()
            })
            .then(data => {
                console.log(data);

                const formattedData = data.map(dat => {
                let row = '';
                for (const key in dat) {
                    if (key === 'subject') {
                        row += `${key}: ${dat[key]}<br>
                                <form id="editForm" action="readApiEdit.php" method="GET">
                                    <input type="hidden" name="tid" value="${tid}">
                                    <button type="submit">Edit</button>
                                </form>
                                
                                <form id="deleteForm" action="delete.php" method="POST">
                                        <input type="hidden" name="tid" value="${tid}">
                                        <button type="submit">Delete</button>
                                    </form><br>`;
                    } else {
                        row += `${key}: ${dat[key]}<br>`;
                    }
                }
                return row;
            });

                document.querySelector('#jsonApiOutput').innerHTML = formattedData.join('<hr>');

                })
        });
        
//  todo: did u solve this above with the edit part of the api call..? cause delete thread below is commented out
        function updateThread(tid) {
    // Perform the update operation using the threadId
    // You can use an AJAX request or redirect to the update page
    // Example: window.location.href = `update.php?id=${threadId}`;
    console.log(`Update thread: ${tid}`);
    window.location.href = `update.php?id=${tid}`;
}
/*
function deleteThread(tid) {
    // Perform the delete operation using the threadId
    // You can use an AJAX request or prompt for confirmation before deleting
    // Example: if (confirm('Are you sure you want to delete this thread?')) { // Perform delete }
    console.log(`Delete thread: ${tid}`);
}
*/
    </script>


<?php

//  take thread id from read.php 
//  TODO I guess u better make the form in html and put there the tid from async call!!!

//  actually, it is not asynvh form call, its just php, so it is geting tid from session or wherever it actually might be in this case..? maybe extract it from $_gET[$tid] ...?

//    require_once('./read.php');

//  dsplays the form for a post, u need a thread id!!!: maybe extract it from $_gET[$tid] ...?

require_once('./includes/post_form.php');

//  cause in postapi.php, you got post_form_forumapi and than an asynch call..?

?>


</body>
</html>
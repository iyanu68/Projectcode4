document.addEventListener('DOMContentLoaded', function () {
    // Wait for the DOM to be fully loaded

    // Find the POST button and attach a click event listener
    document.getElementById('post-btn').addEventListener('click', function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        var editMode = document.getElementById('edit-mode').value === 'true';
        // Call the function to handle the post
        handlePost(editMode);
    });
});

// Function to handle the post
function handlePost(editMode) {
    // Get the values of the title and text
    var postContent = document.getElementById('postContent').value;
    var post_id = document.getElementById('post-id').value;

    // Check if postContent is not empty
    if (!postContent.trim()) {
        alert('Please enter something before posting.');
        return;
    }

    // Make an AJAX request to the PHP script
    $.ajax({
        type: 'POST',
        url: 'submit.php', // Replace with the correct path to your PHP script
        data: {
            postContent: postContent,
            post_id: post_id,
            edit_mode: editMode
        },
        success: function (response) {
            alert('Post added/updated successfully.');
            console.log('Response:', response);
        
            // If in edit mode, find and update the existing post
            if (editMode) {
                updatePost(post_id, postContent);
            } else {
                // Pass title and postContent to createPostDiv
                var postDiv = createPostDiv( postContent, post_id);
                
                // Append the post div to the posts container
                document.getElementById('posts-container').appendChild(postDiv);
            }
        
            // Optional: Clear the form fields
            document.getElementById('postContent').value = '';
            document.getElementById('edit-mode').value = 'false'; // Reset edit mode
            document.getElementById('post-id').value = '';
        },
        error: function (error) {
            console.error('Error adding/updating post:', error);
        }
    });
}
// Function to handle the like button click
function handleLike() {
    var likeCounter = this.nextElementSibling; // Get the sibling span element
    var currentLikes = parseInt(likeCounter.textContent, 10);
    likeCounter.textContent = (currentLikes + 1).toString();
}

// Function to create a new post div
function createPostDiv(postContent, post_id) {
    var postDiv = document.createElement('div');
    postDiv.id = 'post-' + post_id;
    postDiv.className = 'post-container';
    postDiv.style.marginTop = '9vh';
    postDiv.style.marginLeft = '3vh';
    postDiv.style.marginRight = '30vh';
    postDiv.style.padding = 'px';
    
    postDiv.style.border = 'none';
    postDiv.style.borderRadius = '10px';

    // Create elements for title and text
    var postContentElement = document.createElement('h3');
    postContentElement.textContent = postContent;

    

    
    // Create a div for the like button
    var likeContainer = document.createElement('div');

    var likeButton = document.createElement('button');
    likeButton.textContent = 'Like';
    likeButton.className = 'btn btn-secondary like-btn';
    likeButton.addEventListener('click', handleLike);

    var likeCounter = document.createElement('span');
    likeCounter.textContent = '0';
    likeCounter.className = 'like-counter';

    likeButton.style.marginRight = '5px';

    // Append elements to the like container
    likeContainer.appendChild(likeButton);
    likeContainer.appendChild(likeCounter);

    // Inside createPostDiv function
    var commentContainer = document.createElement('div');
    commentContainer.className = 'comment-container';

    var commentInput = document.createElement('input');
    commentInput.type = 'text';
    commentInput.className = 'form-control comment-input';
    commentInput.placeholder = 'Add a comment';

    var commentButton = document.createElement('button');
    commentButton.textContent = 'Comment';
    commentButton.className = 'btn btn-info comment-btn';
    commentButton.addEventListener('click', function () {
    handleComment(post_id, commentInput.value);
 });

    var commentList = document.createElement('ol');
    commentList.className = 'comment-list';

    // Append elements to the comment container
    commentContainer.appendChild(commentInput);
    commentContainer.appendChild(commentButton);
    commentContainer.appendChild(commentList);

    // Append the comment container to the post div
    postDiv.appendChild(commentContainer);

    var editLink = document.createElement('a');
editLink.textContent = 'Edit';
editLink.href = "#";
editLink.className = 'edit-link';
editLink.addEventListener('click', function (event) {
    event.preventDefault();
    handleEdit(post_id, postContent); // Corrected from postC to postContent
});
    // Append elements to the post div
   
    postDiv.appendChild(postContentElement);
    postDiv.appendChild(likeContainer);
    postDiv.appendChild(editLink);

    return postDiv;
}

function handleComment(post_id, comment) {
    // You can make an AJAX request to the server to store comments in the database
    // For simplicity, let's just append the comment to the post div

    var commentList = document.getElementById('post-' + post_id).querySelector('.comment-list');

    var commentItem = document.createElement('li');
    commentItem.textContent = comment;

    // Append the comment to the comment list
    commentList.appendChild(commentItem);
}

function handleEdit(post_id, postContent) {
    // Set the form fields with the post content for editing
    document.getElementById('postContent').value = postContent;
    document.getElementById('edit-mode').value = 'true';
    document.getElementById('post-id').value = post_id;

    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updatePost(post_id, postContent) {
    var existingPost = document.getElementById('post-' + post_id);

    if (existingPost) {
        existingPost.querySelector('h3').textContent = postContent;
    } else {
        console.error('Existing post not found:', post_id);
    }
    // TODO: Implement logic to find and update an existing post
    console.log('Updating post:', post_id, postContent);
}
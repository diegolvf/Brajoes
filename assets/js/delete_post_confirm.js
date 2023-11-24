function confirmDelete(postId) {
    var confirmDelete = confirm("Tem certeza que deseja excluir este post?");
    if (confirmDelete) {
        window.location.href = 'delete_post.php?id=' + postId;
    }
}
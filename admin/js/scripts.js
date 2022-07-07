function deleteCourse(id) {
    if (confirm('Are you sure you want to delete this record...')) {
        document.location = "delete.php?id=" + id;
    }
    return false;
}
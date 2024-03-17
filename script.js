function updateRow(button) {
  let row = button.parentNode.parentNode;

  let title = row.cells[0].innerText;
  let author = row.cells[1].innerText;
  let category = row.cells[2].innerText;
  let publisher = row.cells[3].innerText;

  let bookId = button.getAttribute("data-book-id");

  document.getElementById("update-bookId").value = bookId;

  document.getElementById("update-title").value = title;
  document.getElementById("update-category").value = category;
  document.getElementById("update-author").value = author;
  document.getElementById("update-publisher").value = publisher;
}

function confirmDelete(button) {
  let bookId = button.getAttribute("data-book-id");
  let confirmation = confirm("Are you sure you want to delete this book?");

  if (confirmation) {
    window.location.href = "delete.php?bookId=" + bookId;
  }
}

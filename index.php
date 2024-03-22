<?php
require "database.php";
$result = mysqli_query($mysqli, "SELECT * FROM tblbooks ORDER BY bookId DESC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script defer src="script.js"></script>
    <script defer src="https://kit.fontawesome.com/c38be22fc6.js" crossorigin="anonymous"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style_index.css" />
    <title>Bookshop</title>
  </head>
  <body>
    <div class="main-container">
      <header>
        <h1>Bookshop</h1>
        <div class="list">
          <ul>
            <li>
              
              <a href="#" data-bs-toggle="modal" data-bs-target="#addModal"
                ><i class="fa-solid fa-book"></i> Add Book</a
              >
            </li>
          </ul>
          <ul>
            <li><a href="#">About us</a></li>
          </ul>
          <ul>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </header>
      <section>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Publisher</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="align-middle">
            <?php 
                      while($book_data = mysqli_fetch_array($result)){
                        echo " <tr>";
                        echo "<td>" .$book_data['bookTitle']."</td>";
                        echo "<td>" .$book_data['author']."</td>";
                        echo "<td>" .$book_data['bookCategory']."</td>";
                        echo "<td>" .$book_data['publisher']."</td>";
                        echo "<td> <button class='btn btn-dark update-btn' 
                        data-bs-toggle='modal' 
                        data-bs-target='#updatemodal'
                        data-book-id='" . $book_data['bookId'] . "' 
                        onclick='updateRow(this)'>Update</button>
                                  <button class='btn btn-dark'
                                  data-book-id='" . $book_data['bookId'] . "'
                                  onclick='confirmDelete(this)'
                                  >Delete</button>
                        </td>";
                        echo " </tr>";
                      }
                      ?>
          </tbody>
        </table>
      </section>
    </div>
    <!-- ADD MODAL -->
    <div
      class="modal fade"
      id="addModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Book</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="add.php" method="post" name="resultTable">
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="floatingInput"
                  placeholder="Book Title"
                  name="title"
                  required
                />
                <label for="floatingInput">Title</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Book Category"
                  name="category"
                  required
                />
                <label for="floatingPassword">Category</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Author"
                  name="author"
                  required
                />
                <label for="floatingPassword">Author</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Publisher"
                  name="publisher"
                  required
                />
                <label for="floatingPassword">Publisher</label>
              </div>
              <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-primary">
                  Add
                </button>
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
              
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      <!-- UPDATE MODAL -->
                      
      <div
        class="modal fade"
        id="updatemodal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">
                Update Book
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form action="update.php" method="post" name="updateForm">
              <input type="hidden" name="bookId" id="update-bookId">
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="update-title"
                    placeholder="Book Title"
                    name="update-title"
                    required
                  />
                  <label for="update-title">Title</label>
                </div>

                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="update-category"
                    placeholder="Book Category"
                    name="update-category"
                    
                    required
                  />
                  <label for="update-category">Category</label>
                </div>

                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="update-author"
                    placeholder="Author"
                    name="update-author"
                    required
                  />
                  <label for="update-author">Author</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="update-publisher"
                    placeholder="Publisher"
                    name="update-publisher"
                    required
                  />
                  <label for="update-publisher">Publisher</label>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="update-submit" class="btn btn-primary">
                    Update
                  </button>
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                  >
                    Close
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>

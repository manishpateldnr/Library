<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Library Management System</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The Library Management System is a user-friendly and efficient software designed to manage library operations seamlessly. This system simplifies tasks like book issuance, returns, fine payments, membership management, and user handling, making it ideal for libraries of any size. It caters to both administrators and users, with specific access levels to ensure security and accountability.
                    </p>
                    <p>
                        Mentor: <strong>Acxiom Consulting</strong>
                    </p>
                    <p>Developed by:</p>
                    <p class="lh-1 text-sm font-monospace">Manish Kumar reg-210101120013</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadmcq" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Library Management System</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./backend/uploadmcq.php" method="post" enctype="multipart/form-data">
                        <select name="subject" id="subject">
                            <option value="CUTM1018">php</option>
                        </select>
                        <br>
                        <input type="file" name="mcqs" accept=".csv">
                        <button type="submit">submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal2">Close</button>
                </div>
            </div>
        </div>
    </div>
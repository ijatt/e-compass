<?php
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-COMPASS</title>
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="side-bar">
        <h2>e-COMPASS</h2>
        <ul class="nav-items">
            <li class="nav-item"><a href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
            <li class="nav-item"><a href="event.php"><i class="fa-solid fa-calendar"></i> Event Calendar</a></li>
            <li class="nav-item"><a href="meetings.php"><i class="fa-solid fa-calendar-days"></i> Meetings</a></li>
            <li class="nav-item"><a href="message.php"><i class="fa-solid fa-envelope"></i> Message</a></li>
            <li class="nav-item  active"><a class="active" href=""><i class="fa-solid fa-box"></i> Merchandise</a></li>
            <li class="nav-item"> <a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> LOGOUT</a></li>
        </ul>
    </div>
    <main>
        <div class="card merch">
            <?php
                $sql = "SELECT * FROM merchandise ORDER BY merchStock DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    if($row['merchStock'] > 0){
                        $stock = 'In Stock';
                    }
                    else{
                        $stock = 'Out of Stock';
                    }
            ?>
            <div class="item-card">
                <div class="card-img">
                    <img class="merch-img" src="<?php echo $row['merchImg'] ?>" alt="">
                    <?php
                        if($row['merchStock'] == 0){
                    ?>
                    <div class="out-of-stock">Out of Stock</div>
                    <?php
                        }
                    ?>
                </div>
                <div class="item-info">
                    <h3><?php echo $row['merchName']?></h3>
                    <p class="item-desc"><?php echo $row['merchDesc']?></p>
                    <p class="stock"><?php echo $stock?></p>
                    <div class="card-footer">
                        <p class="price">RM <?php echo $row['merchPrice']?></p>
                        <a href="" class="btn-manage">Manage</a>
                    </div>
                </div>
                <div class="edit-info">
                    <form action="update-merch.php?merchID=<?php echo $row['merchID'] ?>" method="POST">
                        <div class="form-box">
                            <label for="merch-name">Name</label>
                            <input type="text" name="merchName" id="merch-name" value="<?php echo $row['merchName'] ?>">
                        </div>
                        <div class="form-box">
                            <label for="merch-desc">Description</label>
                            <input type="text" name="merchDesc" id="merch-desc" value="<?php echo $row['merchDesc'] ?>">
                        </div>
                        <div class="form-box">
                            <label for="merch-price">Price</label>
                            <input type="text" name="merchPrice" id="merch-price" value="<?php echo $row['merchPrice'] ?>">
                        </div>
                        <div class="form-box">
                            <label for="merch-stock">Stock</label>
                            <input type="text" name="merchStock" id="merch-stock" value="<?php echo $row['merchStock'] ?>">
                        </div>
                        <div class="form-buttons">
                            <button class="btn-edit btn-cancel" id="btn-cancel">Cancel</button>
                            <div class="right-buttons">
                                <button type="button" class="btn-edit btn-cancel btn-edit" id="btn-delete">Delete</button>
                                <button class="btn-edit btn-save">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pop-message">
                    <div class="top-panel">
                        <h3>Message</h3>
                        <span class="close"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <div class="body-panel">
                        <p class="message">Are you sure want to delete this item?</p>
                        <a href="delete-merch.php?merchID=<?php echo $row['merchID'] ?>" class="btn-edit">Delete</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            <a href="add-merch.php"class="add-item"><i class="fa-solid fa-plus"></i></a>
            <div class="pop-message deleted">
                    <div class="top-panel">
                        <h3>Message</h3>
                        <span class="close"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <div class="body-panel">
                        <p class="message">Item has been deleted!</p>
                    </div>
                </div>
        </div>
    </main>
    <script>
        const btnManage = document.querySelectorAll('.btn-manage');
        btnManage.forEach(btn => {
            btn.addEventListener('click', (event) => {
                event.preventDefault();
                const button = event.target;
                const itemCard = button.closest('.item-card');
                const cardImg = itemCard.querySelector('.merch-img');
                itemCard.classList.toggle('manage');
                cardImg.classList.toggle('manage-img');

                const itemInfo = itemCard.querySelector('.item-info');
                const editInfo = itemCard.querySelector('.edit-info');
                itemInfo.style.display = 'none';
                editInfo.style.display = 'block';

                itemCard.style.transition = 'none';
                itemCard.scrollIntoView({ behavior: 'smooth' });
                setTimeout(() => {
                    itemCard.style.transition = '';
                }, 500);

                const btnCancel = editInfo.querySelector('#btn-cancel');
                btnCancel.addEventListener('click', (event) => {
                    event.preventDefault();
                    itemCard.classList.remove('manage');
                    cardImg.classList.remove('manage-img');
                    itemInfo.style.display = 'block';
                    editInfo.style.display = 'none';
                });

                const btnDelete = editInfo.querySelector('#btn-delete');
                btnDelete.addEventListener('click', (event) => {
                    const popMessage = itemCard.querySelector('.pop-message');
                    popMessage.style.display = 'block';
                    const close = popMessage.querySelector('.close');
                    close.onclick = () => {
                        popMessage.style.display = 'none';
                    }
                })

            });
        });

        const urlParams = new URLSearchParams(window.location.search);
        const deleteItem = urlParams.get('deleteItem');
        if(deleteItem == 'success'){
            const popMessage = document.querySelector('.deleted');
            popMessage.style.display = 'block';
            const close = popMessage.querySelector('.close');
            close.onclick = () => {
                popMessage.style.display = 'none';
            }
        }
        const updateItem = urlParams.get('updateItem');
        if(updateItem == 'success'){
            const popMessage = document.querySelector('.deleted');
            popMessage.style.display = 'block';
            const message = popMessage.querySelector('.message');
            message.innerHTML = 'Item has been updated!';
            const close = popMessage.querySelector('.close');
            close.onclick = () => {
                popMessage.style.display = 'none';
            }
        }
        const addItem = urlParams.get('addItem');
        if(addItem == 'success'){
            const popMessage = document.querySelector('.deleted');
            popMessage.style.display = 'block';
            const message = popMessage.querySelector('.message');
            message.innerHTML = 'Item has been added!';
            const close = popMessage.querySelector('.close');
            close.onclick = () => {
                popMessage.style.display = 'none';
            }
            
        }
    </script>
</body>
</html>
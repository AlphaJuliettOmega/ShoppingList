<!-- home view that displays shopping list and checked status of items -->
<?php require_once __DIR__ . '/header.php'; ?>
<div class="container">

    <ul id="shopping-list" class="list-group mt-3">
        <?php foreach ($data['items'] as $item) : ?>
            <li class="list-group-item">
                <input disabled type="checkbox" class="form-check-input" id="item-<?php echo $item->id; ?>" <?php echo $item->is_checked ? 'checked' : ''; ?>>
                <label class="form-check-label" for="item-<?php echo $item->id; ?>"><?php echo $item->is_checked ? 'purchased' : 'item not purchased'; ?></label>

                <p><?php echo $item->product_title; ?></p>

                <form class="edit-item-title-form" method="post">
                    New name:
                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                    <input type="text" name="product_title" value="<?php echo $item->product_title; ?>">
                    <input type="hidden" name="action" value="edit">                    
                    <button class="btn btn-secondary btn-sm float-right check-item" data-id="<?php echo $item->id; ?>">Save</button>
                </form>

                <form class="toggle-item-form" method="post">
                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                    <input type="hidden" name="is_checked" value="<?php echo !$item->is_checked; ?>">
                    <input type="hidden" name="product_title" value="<?php echo $item->product_title; ?>">
                    <input type="hidden" name="action" value="check">                    
                    <button class="btn btn-secondary btn-sm float-right check-item" data-id="<?php echo $item->id; ?>">Mark as <?php echo $item->is_checked ? 'not purchased' : 'purchased'; ?></button>
                </form>

                <form class="delete-item-form" method="post">
                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                    <input type="hidden" name="action" value="delete">
                    <button class="btn btn-danger btn-sm float-right delete-item" data-id="<?php echo $item->id; ?>">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <form id="add-item-form" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label for="product-title">Add new item:</label>
            <input type="text" class="form-control" id="product-title" name="product_title" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>

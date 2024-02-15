<!-- home view that displays shopping list and checked status of items -->
<?php require_once __DIR__ . '/header.php'; ?>
<div class="container">
    <h1>Shopping List</h1>
    <form id="add-item-form" action="/add-item" method="post">
        <div class="form-group">
            <label for="product-title">Product Title</label>
            <input type="text" class="form-control" id="product-title" name="product_title" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
    <ul id="shopping-list" class="list-group mt-3">
        <?php foreach ($data['items'] as $item) : ?>
            <li class="list-group-item">
                <input type="checkbox" class="form-check-input" id="item-<?php echo $item->id; ?>" <?php echo $item->is_checked ? 'checked' : ''; ?>>
                <label class="form-check-label" for="item-<?php echo $item->id; ?>"><?php echo $item->product_title; ?></label>
                <button class="btn btn-danger btn-sm float-right delete-item" data-id="<?php echo $item->id; ?>">Delete</button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>

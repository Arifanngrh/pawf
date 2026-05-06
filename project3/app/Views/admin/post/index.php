```html id="h4t9s2"
<div class="post-card d-flex gap-3 align-items-start">

    <!-- THUMBNAIL -->
    <div style="width:100px; height:80px; overflow:hidden; border-radius:10px;">
        <?php if($post['image']): ?>
            <img src="<?= base_url('uploads/'.$post['image']) ?>"
                 style="width:100%; height:100%; object-fit:cover;">
        <?php else: ?>
            <div style="width:100%; height:100%; background:#1e293b; display:flex; align-items:center; justify-content:center; font-size:12px;">
                No Image
            </div>
        <?php endif; ?>
    </div>

    <!-- CONTENT -->
    <div class="flex-grow-1">

        <h5>
            <a href="<?= base_url('admin/post/'.$post['id'].'/edit') ?>">
                <?= $post['title'] ?>
            </a>
        </h5>

        <small style="color:#94a3b8;">
            <?= date('d M Y', strtotime($post['created_at'])) ?>
        </small>

        <div class="mt-1">
            <?php if($post['status'] == 'published'): ?>
                <span class="badge bg-success">Published</span>
            <?php else: ?>
                <span class="badge bg-secondary">Draft</span>
            <?php endif; ?>
        </div>

        <p class="mt-2">
            <?= substr(strip_tags($post['content']), 0, 100) ?>...
        </p>

        <div class="d-flex gap-2">
            <a href="<?= base_url('admin/post/'.$post['id'].'/preview') ?>"
               class="btn btn-sm btn-outline-light">Preview</a>

            <a href="<?= base_url('admin/post/'.$post['id'].'/edit') ?>"
               class="btn btn-sm btn-outline-info">Edit</a>

            <a href="<?= base_url('admin/post/'.$post['id'].'/delete') ?>"
               onclick="return confirm('Yakin hapus?')"
               class="btn btn-sm btn-outline-danger">Delete</a>
        </div>

    </div>

</div>
```

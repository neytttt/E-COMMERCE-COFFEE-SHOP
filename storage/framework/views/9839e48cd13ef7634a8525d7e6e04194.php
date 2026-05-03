<?php $__env->startSection('title', 'Banners - Admin'); ?>

<?php $__env->startSection('page-title', 'Banners'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="toolbar">
        <form action="<?php echo e(route('admin.banners.index')); ?>" method="GET" class="search-form">
            <select name="position" class="form-input">
                <option value="">All Positions</option>
                <option value="hero" <?php echo e(request()->position === 'hero' ? 'selected' : ''); ?>>Hero</option>
                <option value="banner" <?php echo e(request()->position === 'banner' ? 'selected' : ''); ?>>Banner</option>
                <option value="featured" <?php echo e(request()->position === 'featured' ? 'selected' : ''); ?>>Featured</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <a href="<?php echo e(route('admin.banners.create')); ?>" class="btn btn-primary">Add Banner</a>
    </div>
    
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php if($banner->image): ?>
                        <img src="<?php echo e(asset('storage/' . $banner->image)); ?>" alt="<?php echo e($banner->title); ?>" class="table-image">
                        <?php else: ?>
                        <div class="no-image">-</div>
                        <?php endif; ?>
                    </td>
                    <td><strong><?php echo e($banner->title); ?></strong></td>
                    <td>
                        <span class="badge badge-info"><?php echo e(ucfirst($banner->position)); ?></span>
                    </td>
                    <td>
                        <span class="badge <?php echo e($banner->is_active ? 'badge-success' : 'badge-error'); ?>">
                            <?php echo e($banner->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('admin.banners.edit', $banner->id)); ?>" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.banners.toggle', $banner->id)); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e($banner->is_active ? 'Disable' : 'Enable'); ?></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <div class="pagination">
            <?php echo e($banners->links()); ?>

        </div>
    </div>
</div>

<style>
.page-content { padding: 2rem; }
.toolbar { display: flex; justify-content: space-between; margin-bottom: 1.5rem; }
.search-form { display: flex; gap: 1rem; }
.search-form .form-input { width: 200px; }
.table-image { width: 100px; height: 60px; object-fit: cover; border-radius: 4px; }
.no-image { width: 100px; height: 60px; background: var(--admin-bg-hover); display: flex; align-items: center; justify-content: center; border-radius: 4px; }
.actions { display: flex; gap: 0.5rem; }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/banners/index.blade.php ENDPATH**/ ?>
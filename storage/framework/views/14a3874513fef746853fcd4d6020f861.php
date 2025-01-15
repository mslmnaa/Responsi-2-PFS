

<?php $__env->startSection('content'); ?>
<!-- Hero Section with Parallax Effect -->
<div class="relative h-[500px] overflow-hidden">
    <div class="absolute inset-0 transform scale-105" 
         style="background-image: url('/img/kopi4.jpg'); 
                background-size: cover; 
                background-position: center; 
                background-attachment: fixed;">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/70"></div>
    <div class="relative h-full flex items-center justify-center text-center px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight animate-fade-in">
                Our Menu
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto leading-relaxed">
                Discover our carefully curated selection of artisanal coffees, premium teas, 
                and Refresh made with love
            </p>
            <div class="flex justify-center space-x-4">
                <a href="#coffee" class="px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-all duration-300 transform hover:scale-105">
                    View Coffee Menu
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Menu Categories Navigation -->
<div class="sticky top-0 bg-white shadow-md z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-center space-x-8 py-4">
            <a href="#coffee" class="text-primary-600 hover:text-primary-800 font-medium transition-colors duration-200">Coffee</a>
            <a href="#tea" class="text-primary-600 hover:text-primary-800 font-medium transition-colors duration-200">Tea</a>
            <a href="#refresh" class="text-primary-600 hover:text-primary-800 font-medium transition-colors duration-200">Refresh</a>
        </div>
    </div>
</div>

<!-- Menu Sections -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
    <!-- Coffee Section -->
    <section id="coffee" class="scroll-mt-24">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary-800 mb-4">Specialty Coffee</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Hand-selected beans, expertly roasted and crafted to perfection</p>
        </div>
        
        <?php if($coffeeProducts->isNotEmpty()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $coffeeProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary-800 mb-2"><?php echo e($product->name); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo e($product->description); ?></p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary-600">$<?php echo e(number_format($product->price, 2)); ?></span>
                            <?php if(auth()->guard()->check()): ?>
                                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" 
                                            class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 
                                                   transition-colors duration-200 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" 
                                   class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 
                                          transition-colors duration-200">
                                    Login to Buy
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12 bg-gray-50 rounded-xl">
                <p class="text-gray-500">Our coffee selection is currently being updated. Check back soon!</p>
            </div>
        <?php endif; ?>
    </section>

    <!-- Tea Section -->
    <section id="tea" class="scroll-mt-24">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary-800 mb-4">Premium Teas</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">A curated selection of fine teas from around the world</p>
        </div>
        
        <?php if($teaProducts->isNotEmpty()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $teaProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary-800 mb-2"><?php echo e($product->name); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo e($product->description); ?></p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary-600">$<?php echo e(number_format($product->price, 2)); ?></span>
                            <?php if(auth()->guard()->check()): ?>
                                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" 
                                            class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 
                                                   transition-colors duration-200 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" 
                                   class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 
                                          transition-colors duration-200">
                                    Login to Buy
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12 bg-gray-50 rounded-xl">
                <p class="text-gray-500">Our tea selection is currently being updated. Check back soon!</p>
            </div>
        <?php endif; ?>
    </section>

    <!-- Pastries Section -->
    <section id="refresh" class="scroll-mt-24">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary-800 mb-4">Refresh</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Refresh Your Day</p>
        </div>
        
        <?php if($refreshProducts->isNotEmpty()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $refreshProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary-800 mb-2"><?php echo e($product->name); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo e($product->description); ?></p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-primary-600">$<?php echo e(number_format($product->price, 2)); ?></span>
                            <?php if(auth()->guard()->check()): ?>
                                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" 
                                            class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 
                                                   transition-colors duration-200 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" 
                                   class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 
                                          transition-colors duration-200">
                                    Login to Buy
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12 bg-gray-50 rounded-xl">
                <p class="text-gray-500">Our pastry selection is currently being updated. Check back soon!</p>
            </div>
        <?php endif; ?>
    </section>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PFS-Praktikum\toko-online\resources\views/menu.blade.php ENDPATH**/ ?>
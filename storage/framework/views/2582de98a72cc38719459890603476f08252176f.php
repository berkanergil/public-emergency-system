 <div class="">
     <select id="mySelect" class="form-select" onchange="location = this.value; showMov(this.value)">
         <option value="" selected="selected"> - </option>
         <option id="en" value="<?php echo e(route('switchLanguage', ['locale' => 'en'])); ?>"><i
                 class="flag flag-united-kingdom"></i>EN
         </option>
         <option id="en" value="<?php echo e(route('switchLanguage', ['locale' => 'tr'])); ?>"><i
                 class="flag flag-turkey"></i>TR</i>
         </option>
     </select>
 </div>
<?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/layouts/languageSwitcher.blade.php ENDPATH**/ ?>
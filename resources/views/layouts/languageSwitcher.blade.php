 <div class="">
     <select id="mySelect" class="form-select" onchange="location = this.value; showMov(this.value)">
         <option value="" selected="selected"> - </option>
         <option id="en" value="{{ route('switchLanguage', ['locale' => 'en']) }}"><i
                 class="flag flag-united-kingdom"></i>EN
         </option>
         <option id="en" value="{{ route('switchLanguage', ['locale' => 'tr']) }}"><i
                 class="flag flag-turkey"></i>TR</i>
         </option>
     </select>
 </div>


  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed
        left-500 flex justify-center items-center top-50 z-50 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="flex justify-center items-center p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class=" bg-blue-500 text-white flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-white-900 dark:text-white">
                      {{__("messages.opeation")}}
                  </h3>
                  @include(config("files.svg")."close")
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4" id="modal_body">
                  
              </div>
              <!-- Modal footer -->
              <div id="modal_footer" class="hidden flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  
              </div>
          </div>
      </div>
  </div>
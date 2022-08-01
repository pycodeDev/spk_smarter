var dynamic_form = $("#dynamic_form").dynamicForm("#dynamic_form", "#plus5", "#minus5", {
    limit: 10,
    formPrefix: "dynamic_form",
    normalizeFullForm: false
});

$("#dynamic_form #minus5").on('click', function() {
    var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
    if (initDynamicId === 2) {
        $(this).closest('#dynamic_form').next().find('#minus5').hide();
    }
    $(this).closest('#dynamic_form').remove();
});
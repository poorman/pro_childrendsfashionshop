;(function ($, api) {
    'use strict'

    api.controlConstructor['soledad-fw-code'] = api.controlConstructor.default.extend({
        ready: function () {
            var control = this

            this.container.on('change click keyup paste', 'input', function () {
                control.setting.set($(this).val())
            })
        },
    })
})(jQuery, wp.customize)

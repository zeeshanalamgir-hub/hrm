import TomSelect from 'tom-select/base';
import DropdownInput from 'tom-select/plugins/dropdown_input/plugin.js';

TomSelect.define('dropdown_input', DropdownInput);

/*
 * Turns every <select data-searchable> into a searchable dropdown.
 * The original <select> stays in the form, so submitted values are unchanged.
 */
export function initSearchableSelects(root = document) {
    root.querySelectorAll('select[data-searchable]').forEach((select) => {
        if (select.tomselect) {
            return;
        }

        new TomSelect(select, {
            plugins: ['dropdown_input'],
            maxOptions: null,
            allowEmptyOption: true,
            placeholder: select.dataset.placeholder || 'Search...',
            render: {
                no_results: () => '<div class="no-results">No matches found</div>',
            },
        });
    });
}

var gridster_level_1;
var gridsters_holder = {};
var id_counter = 0;
$(document).ready(function() {
    // main gridster
    gridster_level_1 = $('#main-app ul.level-one').gridster({
        namespace: 'ul.level-one',
        widget_base_dimensions: [50, 50],
        widget_margins: [2.5, 2.5],
       shift_larger_widgets_down: false,
        
        resize: {
            enabled: false
        }
    }).data('gridster');

    $('.add-room').click(function() {
        var html = '<li data-id="' + id_counter + '" data-level="one"><ul class="level-two"></ul></li>';
        var width = parseInt(5);
        var height = parseInt(5);
        var new_gridster_dom = gridster_level_1.add_widget(html, width, height, 1, 1);
        // subgridster
        var gridster_level_2 = $('li[data-id="' + id_counter + '"] ul.level-two').gridster({
            namespace: 'ul.level-two',
            widget_base_dimensions: [30, 30],
            widget_margins: [10, 10],
            shift_larger_widgets_down: false,

            resize: {
                enabled: false
            },
            draggable: {
                stop: function(event) {
                    event.stopPropagation();
                }
            }
        }).data('gridster');

        // setting event handlers for new room
        $('li[data-id="' + id_counter + '"] > .delete').click(function(event) {
            event.stopPropagation();
            delete_room($(this));
        });
        add_room_click();

        // since the built-in col and row values seem to change, we need to add fixed values for grid availability calculations - after that, add it to the gridster array
        gridster_level_2.set_cols = width;
        gridster_level_2.set_rows = height;
        gridsters_holder[id_counter] = gridster_level_2;
        id_counter += 1;
    });

    // button click events - this is kind of a funky way to deal with things, but it works
    $('.add-station').click(function() {
        $('body').addClass('selecting');
        $('.add-station').addClass('hide');
        $('.cancel-station').removeClass('hide');
        $('.cancel-change-station').click();
    });
    $('.cancel-station').click(function() {
        $('body').removeClass('selecting');
        $('.add-station').removeClass('hide');
        $('.cancel-station').addClass('hide');
    });

    $('.change-station').click(function() {
        $('body').addClass('changing');
        $('.change-station').addClass('hide');
        $('.cancel-change-station').removeClass('hide');
        $('.cancel-station').click();
    });
    $('.cancel-change-station').click(function() {
        $('body').removeClass('changing');
        $('.change-station').removeClass('hide');
        $('.cancel-change-station').addClass('hide');
    });

    // this resets the click event handler on rooms, for adding workstations
    function add_room_click() {
        $('li[data-level="one"]').off();
        $('li[data-level="one"]').click(function() {
            if ($('body').hasClass('selecting')) {
                var gridster_id = $(this).attr('data-id');
                var current_gridster = gridsters_holder[gridster_id];
                var html = '<li class="workstation type-one"><div class="delete"></div></li>';
                var coords = get_free_coords(current_gridster);
                console.log(coords);
                // if found a free spot, create the station widget and add change and delete event handlers to it
                if (coords) {
                    var new_workstation = current_gridster.add_widget(html, 1, 1, coords.col, coords.row);
                    new_workstation.click(function(event) {
                        event.stopPropagation();
                        change_station_type($(this));
                    });
                    new_workstation.find('.delete').click(function(event) {
                        event.stopPropagation();
                        delete_workstation($(this));
                    });
                }
            }
        });
    }
    // returns coordinates where there is free space
    function get_free_coords(current_gridster) {
//console.log(current_gridster);
        // first we create a usable gridmap
        var gridmap = [];
        for (var i = 0; i < current_gridster.set_cols; i++) {
            gridmap[i] = []
            for (var j = 0; j < current_gridster.set_rows; j++) {
                gridmap[i][j] = true;
            }
        }
        // setting which ones are used
        var serialized = current_gridster.serialize();
console.log(serialized);
        $.each(serialized, function(index, value) {
            for (var j = 0; j < value.size_x; j++) {
                for (var k = 0; k < value.size_y; k++) {
                    gridmap[value.col - 1 + j][value.row - 1 + k] = false;
                }
            }
        });
//alert(gridmap.length);
        // and finally, finding an appropriate spot
        var found = false;
        for (var i = 0; i < gridmap.length; i++) {
            for (var j = 0; j < gridmap[i].length; j++) {
                if (gridmap[i][j]) {
                    return {'col': i + 1, 'row': j + 1};
                }
            }
        }
        return false;
    }
    // rotates between various station types
    function change_station_type(DOMobject) {
        if ($('body').hasClass('changing')) {
            if (DOMobject.hasClass('type-one')) {
                DOMobject.removeClass('type-one').addClass('type-two');
            } else if (DOMobject.hasClass('type-two')) {
                DOMobject.removeClass('type-two').addClass('type-three');
            } else if (DOMobject.hasClass('type-three')) {
                DOMobject.removeClass('type-three').addClass('type-one');
            }
        }
    }
    // these are kind of self-explanatory
    function delete_workstation(DOMobject) {
        var current_gridster = gridsters_holder[$(DOMobject).parents('li[data-level="one"]').attr('data-id')];
        current_gridster.remove_widget($(DOMobject).parent('li'));
    }
    function delete_room(DOMobject) {
        var confirm = window.confirm('Are you sure you wish to delete this configuration?');
        if (confirm == true) {
            delete gridsters_holder[$(DOMobject).parents('li[data-level="one"]').attr('data-id')];
            var current_widget = $(DOMobject).parent('li[data-level="one"]');
            gridster_level_1.remove_widget(current_widget);
        }
    }
});

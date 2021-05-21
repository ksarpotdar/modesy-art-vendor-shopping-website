<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('pre_print_size'); ?></h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <!-- include message block -->
                <div class="row">
                    <div class="col-12">
                        <div class="product-description post-text-responsive">
                            <div class="card">
                                <div class="box-body">
                                    <div class="row">
                                        <!-- include message block -->
                                        <div class="col-sm-12">
                                            <?php $this->load->view('admin/includes/_messages'); ?>
                                        </div>
                                    </div>

                                   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped" role="grid">
                                                    <?php $this->load->view('admin/predefine/predefine_printsize_post'); ?>
                                                    <thead>
                                                        <tr role="row">
                                                            <th><?php echo trans('id'); ?></th>
                                                            <th><?php echo trans('materials'); ?></th>
                                                            <th><?php echo trans('orientations'); ?></th>
                                                            <th><?php echo trans('pre_print_size'); ?></th>
                                                            <th><?php echo trans('price'); ?></th>
                                                            <th><?php echo trans('date'); ?></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $material_status = 0; $material_name = "";?>
                                                    <?php foreach ($pre_printsizes as $item): ?>
                                                        <?php 
                                                            foreach($pre_materials as $material){
                                                                if($material->id == $item->materials){
                                                                    $material_name = $material->materials;
                                                                    $material_status = 1;
                                                                    break;
                                                                }
                                                            }
                                                        ?>
                                                        <?php if($material_status == 1):?>
                                                        <tr>
                                                            <td>#<?php echo $item->id; ?></td>
                                                            <td><?php echo $material_name; $material_status = 0;?></td>
                                                            <td><?php
                                                                foreach($pre_orientations as $orientation){
                                                                    if($orientation->id == $item->orientations && $this->selected_lang->id == $orientation->lang_id){
                                                                        echo $orientation->option_name;
                                                                        break;
                                                                    }
                                                                }
                                                            ?></td>
                                                            <td><?php echo $item->size; ?></td>
                                                            <td><?php echo $item->price; ?></td>
                                                            <td><?php echo $item->date; ?></td>
                                                            <td style="width:100px;">
                                                                <div class="dropdown">
                                                                    <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                                            type="button"
                                                                            data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu options-dropdown">
                                                                        <li>
                                                                            <a href="<?php echo admin_url(); ?>update-pre-printsizes/<?php echo html_escape($item->id); ?>"><i class="fa fa-edit option-icon"></i><?php echo trans('edit'); ?></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0)" onclick="delete_item('admin_controller/delete_printsizes_item_post','<?php echo $item->id; ?>','<?php echo trans("confirm_delete_item"); ?>');"><i class="fa fa-trash option-icon"></i><?php echo trans('delete'); ?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                                <?php if (empty($pre_printsizes)): ?>
                                                    <p class="text-center">
                                                        <?php echo trans("no_records_found"); ?>
                                                    </p>
                                                <?php endif; ?>
                                                <div class="col-sm-12 table-ft">
                                                    <div class="row">
                                                        <div class="pull-right">
                                                            <?php echo $this->pagination->create_links(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- /.box -->
    </div>
</div>

<script>
    $(".nav-template-item").click(function () {
        $(".nav-template-item").removeClass("active");
        $(this).addClass("active");
        var id = $(this).attr("data-nav-id");
        $("#input_navigation").val(id);
    });
</script>

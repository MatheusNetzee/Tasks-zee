            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container">                                                              
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h1>Welcome to Tasks-zee</h1> 
                                            <div class="panel-body">
                                                <p>This is the place to organize all your tasks, projects, do's, getting emails everyday, about all the thing that you have been note out, and much more please enjoy.</p>
                                            </div>     
                                        </div>
                                     </div>
                                     
                                         <div class="panel panel-info">
                                            <div class="panel-heading">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet"</div>
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada purus nisl. Nullam consectetur accumsan rhoncus. Phasellus tincidunt mauris dolor, quis aliquam ex ultricies quis. Morbi porttitor massa mauris, a pulvinar tellus tincidunt non. Donec quis consequat nunc. Quisque tristique mauris molestie est euismod consectetur. Quisque urna mi, aliquam et gravida ut, egestas nec dolor. Duis at efficitur mi. Donec in molestie erat, luctus scelerisque nisl. Donec condimentum augue sit amet nibh porttitor, quis cursus ex fermentum.</div>
                                        </div>
                                    
                                    
                                        <div class="panel panel-success">
                                            <div class="panel-heading">"Lorem ipsum dolor sit amet."</div>
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada purus nisl. Nullam consectetur accumsan rhoncus. Phasellus tincidunt mauris dolor, quis aliquam ex ultricies quis. Morbi porttitor massa mauris, a pulvinar tellus tincidunt non. Donec quis consequat nunc. Quisque tristique mauris molestie est euismod consectetur. Quisque urna mi, aliquam et gravida ut, egestas nec dolor. Duis at efficitur mi. Donec in molestie erat, luctus scelerisque nisl. Donec condimentum augue sit amet nibh porttitor, quis cursus ex fermentum.</div>
                                        </div>    
                                        
                                        <h2>Stacked Progress Bars</h2>                                        
                                        <p>Create a stacked progress bar by placing multiple bars into the same div with class .progress:</p> 
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" style="width:20%">
                                              completed
                                            </div>
                                            <div class="progress-bar progress-bar-info" role="progressbar" style="width:40%">
                                              not started
                                            </div>
                                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:40%">
                                              lates
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="padding:0">
                                            <div class="panel panel-success ">
                                                <div class="panel-heading">Deseja enviar email a sua conta?</div>
                                                <div class="panel-body"> 
                                                <form action="<?= URL ?>enviaEmail" method="POST">
                                                 <div class="form-group">
                                                    <input class="form-control" type="text" name="nome" required placeholder="Digite seu nome">
                                                </div>
                                                 <div class="form-group">
                                                    <input class="form-control" type="email" name="email" required placeholder="Digite seu email">
                                                </div>
                                                 <div class="form-group">
                                                    <input class="form-control" type="text" name="enderecoEmail" required placeholder="exemplo: gmail.com.br ou netzee.com.br"> 
                                                </div>
                                                    <button class="btn btn-success">Enviar</button>                                            
                                                </form>
                                            </div>
                                        </div>    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

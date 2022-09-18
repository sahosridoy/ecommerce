<form action="{{ route('admin.category.store') }}" method="POST">
                                <div class="form-row">
                                    <div class="col-md-6 mb-4">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="exampleInputPassword1">Password</label>
                                        <select class="select2-example">
                                            <option>Select</option>
                                            <option value="France">France</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="United States">United States</option>
                                            <option value="China">China</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-4">

                                             <label for="exampleInputPassword1">Password</label>
                                        <textarea type="text" class="form-control"></textarea>

                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

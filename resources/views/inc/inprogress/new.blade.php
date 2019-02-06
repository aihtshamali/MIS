<div class="card-block">
        <div class="card-block">
                <div class="dt-responsive table-responsive">
                        <table id="simpletable"
                        class="table table-bordered table-stripped nowrap">
                    <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Sub Sector</th>
                        <th>Assigned By</th>
                        <th>Priority</th>
                        <th>Progress</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                          @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>
                              @foreach ($project->AssignedSubSectors as $sub_sectors)
                                {{ $sub_sectors->SubSector->name }}
                              @endforeach
                            </td>
                            <td>{{ $project->AssignedProject->User->first_name}} {{ $project->AssignedProject->User->last_name }}</td>
                            <td>{{ $project->ProjectDetail->AssigningForum->name }}</td>
                            <td><div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" style="width: {{ $project->AssignedProject->progress }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> {{$project->AssignedProject->progress}}%</div>
                                </div></td>
                            <td>
                            <a href="{{route('monitoring_inprogressSingle',['project_id'=>$project->id])}}" class="btn btn-md  btn-info"> Conduct Monitoring</a>
                            </td>
                        </tr>
                          @endforeach


                    </tbody>
                </table>
            </div>
        </div>
</div>

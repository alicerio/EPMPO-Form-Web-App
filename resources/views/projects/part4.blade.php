<div id = "part4_inputs" class="card">
    <h4><b>Project Readiness Elements:</b></h4>
    <p>"Overall" Estimate of Preliminary Engineering (PE) Examples include: Project Initiation/Planning,
        Initial Design, Environmental Document, PS&E, etc.</p>


    <div class="card-header">
        <div class="form-row">
            <div class="col-sm-3">
                Element
            </div>
            <div class="card-body">
                {{-- Schematic --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Schematic
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="schematic_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->schematic_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="schematic_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->schematic_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="schematic_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->schematic_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>100%
                            </option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="schematic_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->schematic_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="schematic_comments" class="form-control" autocomplete="off"
                            value="{{ $project->schematic_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- Env. Doc. Type --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Env. Doc. Type
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="envdoctype_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->envdoctype_start_date  ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input id= "locked_val1" type="date" name="envdoctype_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->envdoctype_end_date  ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select id= "locked_val2" disabled name="envdoctype_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->envdoctype_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%
                            </option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id= "locked_val3" disabled name="envdoctype_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->envdoctype_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="envdoctype_comments" class="form-control" autocomplete="off"
                            value="{{ $project->envdoctype_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- Environmental Doc --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Environmental Doc
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="envdoc_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->envdoc_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="envdoc_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->envdoc_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="envdoc_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->envdoc_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="envdoc_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->envdoc_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="envdoc_comments" class="form-control" autocomplete="off"
                            value="{{ $project->envdoc_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- PS&E --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        PS&E
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="pse_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->pse_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="pse_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->pse_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="pse_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->pse_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>100%
                            </option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="pse_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->pse_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="pse_comments" class="form-control" autocomplete="off"
                            value="{{ $project->pse_comments ?? ''}}" disabled>
                    </div>
                </div>
                {{-- ROW Map --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        ROW Map(s)
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="rowmap_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->rowmap_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="rowmap_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->rowmap_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="rowmap_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->rowmap_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="rowmap_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->rowmap_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="rowmap_comments" class="form-control" autocomplete="off"
                            value="{{ $project->rowmap_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- ROW Acquired --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        ROW Acquired
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="rowacq_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->rowacq_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="rowacq_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->rowacq_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="rowacq_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->rowacq_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="rowacq_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->rowacq_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="rowacq_comments" class="form-control" autocomplete="off"
                            value="{{ $project->rowacq_comments  ?? ''}}" disabled>
                    </div>
                </div>
                {{-- Utilities --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Utilities
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="utilities_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->utilities_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="utilities_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->utilities_end_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="utilities_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->utilities_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="utilities_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->utilities_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="utilities_comments" class="form-control" autocomplete="off"
                            value="{{ $project->utilities_comments ?? ''}}" disabled>
                    </div>
                </div>
                {{-- Public Involvement --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Public Involvement
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="pubinv_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->pubinv_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="pubinv_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->pubinv_end_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="pubinv_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->pubinv_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="pubinv_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->pubinv_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="pubinv_comments" class="form-control" autocomplete="off"
                            value="{{ $project->pubinv_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- District Review --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        District Review
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="distrev_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->distrev_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="distrev_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->distrev_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="distrev_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->distrev_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>
                                0%</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="distrev_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->distrev_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="distrev_comments" class="form-control" autocomplete="off"
                            value="{{ $project->distrev_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- Agreement --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Agreement (LPFA)
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="agree_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->agree_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="agree_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->agree_end_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="agree_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->agree_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="agree_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->agree_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="agree_comments" class="form-control" autocomplete="off"
                            value="{{ $project->agree_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- Procurement Process --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Procurement Process
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="procpro_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->procpro_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="procpro_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->procpro_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="procpro_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->procpro_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>
                                0%</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="procpro_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->procpro_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="procpro_comments" class="form-control" autocomplete="off"
                            value="{{ $project->procpro_comments ?? ''}}" disabled>
                    </div>
                </div>
                {{-- Let Date --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Let Date
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="letdate_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->letdate_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input id= "locked_val4" type="date" name="letdate_end_date" class="form-control locked" autocomplete="off"
                            value="{{ $project->letdate_end_date ?? '' }}" disabled>
                    </div> 
                    <div class="col-sm-1">
                        <select id= "locked_val5" disabled name="letdate_progress" class="form-control locked" autocomplete="off">
                            <option></option>
                            {{$temp = $project->letdate_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>
                                0%</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id= "locked_val6" disabled name="letdate_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->letdate_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="letdate_comments" class="form-control" autocomplete="off"
                            value="{{ $project->letdate_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- Construction Performance End Date --}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Construction Performance End Date
                    </div>
                    <div class="col-sm-2">
                        <input id= "locked_val7" type="date" name="consper_end_date_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->consper_end_date_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="consper_end_date_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->consper_end_date_end_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select id= "locked_val8" disabled name="consper_end_date_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->consper_end_date_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>
                                0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%
                            </option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id= "locked_val9" disabled name="consper_end_date_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->consper_end_date_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input id= "locked_val10" type="text" name="consper_end_date_comments" class="form-control" autocomplete="off"
                            value="{{ $project->consper_end_date_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{-- PE Performance --}}
                <div class="form-row">
                    <div class="col-sm-3">
                        PE Performance End Date
                    </div>
                    <div class="col-sm-2">
                        <input id= "locked_val11" type="date" name="peperf_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->peperf_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="peperf_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->peperf_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select id= "locked_val12" disabled name="peperf_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->peperf_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id= "locked_val13" disabled name="peperf_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->peperf_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input id= "locked_val14" type="text" name="peperf_comments" class="form-control" autocomplete="off"
                            value="{{ $project->peperf_comments ?? '' }}" disabled>
                    </div>
                </div>
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        <h5><b>Transit Only</b></h5>
                        <p>"Anticipated Dates"</p>
                    </div>
                </div>
                {{-- FTA Transfer--}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        FTA Transfer Process (If applicable)
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="fta_trans_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->fta_trans_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="fta_trans_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->fta_trans_end_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="fta_trans_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->fta_trans_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp  == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="fta_trans_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->fta_trans_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : '' }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : '' }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="fta_trans_comments" class="form-control" autocomplete="off"
                            value="{{ $project->fta_trans_comments ?? ''}}" disabled>
                    </div>
                </div>
                {{--Bus Purchase--}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Contract Excluded for Bus Purchase
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="bus_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->bus_start_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="bus_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->bus_end_date ?? ''}}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="bus_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->bus_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp  == 5 ? 'selected' : ''  }}>100%
                            </option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="bus_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->bus_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>Local
                            </option>
                            <option value="3" {{ $temp  == 3 ? 'selected' : ''  }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="bus_comments" class="form-control" autocomplete="off"
                            value="{{ $project->bus_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{--Bus Delivery--}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Bus Delivery Date
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="delivery_start_date" class="form-control" autocomplete="off"
                            value="{{ $project->delivery_start_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="delivery_end_date" class="form-control" autocomplete="off"
                            value="{{ $project->delivery_end_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="delivery_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->delivery_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>
                                0%</option>
                            <option value="2" {{ $temp  == 2 ? 'selected' : ''  }}>
                                30%</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                60%</option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>
                                90%</option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="delivery_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->delivery_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>
                                TxDOT</option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>
                                Local</option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>
                                Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="delivery_comments" class="form-control" autocomplete="off"
                            value="{{ $project->delivery_comments ?? '' }}" disabled>
                    </div>
                </div>
                {{--Other--}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Other
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="other_date" class="form-control" autocomplete="off"
                            value="{{ $project->other_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="other_date" class="form-control" autocomplete="off"
                            value="{{ $project->other_date ?? '' }}" disabled>
                    </div>
                    <div class="col-sm-1">
                        <select disabled name="other_progress" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->other_progress ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>0%
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>30%
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>60%
                            </option>
                            <option value="4" {{ $temp == 4 ? 'selected' : ''  }}>90%
                            </option>
                            <option value="5" {{ $temp == 5 ? 'selected' : ''  }}>
                                100%</option>
                            <option value="6" {{ $temp == 6 ? 'selected' : ''  }}>N/A
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select disabled name="other_agency" class="form-control" autocomplete="off">
                            <option></option>
                            {{$temp = $project->other_agency ?? ''}}
                            <option value="1" {{ $temp == 1 ? 'selected' : ''  }}>TxDOT
                            </option>
                            <option value="2" {{ $temp == 2 ? 'selected' : ''  }}>Local
                            </option>
                            <option value="3" {{ $temp == 3 ? 'selected' : ''  }}>Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="other_comments" class="form-control" autocomplete="off"
                            value="{{ $project->other_comments  ?? ''}}" disabled>
                    </div>
                </div>
                {{--Reviewed Dates--}}
                <div class="form-row mb-1">
                    <div class="col-sm-3">
                        Have the above dates been reviewed by TXDOT or NMDOT
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input disabled type="checkbox" name="reviewed_yes" autocomplete="off"
                                value="{{ $project->reviewed_yes ?? '' }}">
                            Yes
                        </label><br>
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input disabled type="checkbox" name="reviewed_no" autocomplete="off"
                                value="{{ $project->reviewed_no ?? ''}}">
                            No
                        </label><br>
                    </div>
                    <div class="col-sm-2">
                        <label>
                            <input disabled type="checkbox" name="reviewed_na" autocomplete="off"
                                value="{{ $project->reviewed_na ?? ''}}">
                            N/A
                        </label><br>
                    </div>
                    <div class="col-sm-2">
                        <label for="date_reviewed">Date Reviewed</label>
                        <input type="date" name="date_reviewed" autocomplete="off" value="{{ $project->date_reviewed ?? ''}}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
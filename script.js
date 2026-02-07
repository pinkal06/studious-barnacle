function validateAttendance(total, attended){
    if(attended > total){
        alert("Attended lectures cannot be more than total lectures!");
        return false;
    }
    return true;
}
